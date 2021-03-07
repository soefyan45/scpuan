<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Model\BankMarket;
use App\Model\Categoryitem;
use App\Model\ChartItem;
use App\Model\Item;
use App\Model\LogOrderSeller;
use App\Model\Profile;
use App\Model\ShippingList;
use App\Model\ShopSeller;
use App\Model\TrxLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use League\CommonMark\Inline\Element\Code;

class MarketController extends Controller
{
    ///
    public function Index()
    {
        # code...
        $Item = Item::with(['itemhasimages', 'shopofitem', 'itemuser'])->get();
        //$a = ShopSeller::where('user_id', 5)->get();
        //return $a;
        $Category = Categoryitem::get();
        //return $Item;
        //return $Item[0]['itemuser']['usergetshop']['slugShop'];
        return view('welcome', ['ItemSeller' => $Item, 'categoryItem' => $Category]);
    }
    public function Search(Request $request)
    {
        # code...
        $search = $request['search'];
        $item = Item::where('nameItem', 'like', '%' . $search . '%')
            ->with(['itemhasimages', 'shopofitem', 'itemcategories', 'itemhascolor.getitemcolor'])
            ->get();
        //return $item;
        return view('search', ['Item' => $item]);
    }
    public function detailBarang($shopSlug, $itemSlug)
    {
        # code...
        //$a = $shopSlug;
        $shop = ShopSeller::where('slugShop', $shopSlug)->first();
        if ($shop['banned'] == 0) {
            $Item = Item::where('slugNameItem', $itemSlug)
                ->with(['itemhasimages', 'shopofitem', 'itemcategories', 'itemhascolor.getitemcolor'])
                ->first();
            // return $Item;
            $Category = Categoryitem::all();
            if ($shop['user_id'] == $Item['user_id']) {
                //return $Item;
                return view('detailProduct', ['item' => $Item, 'categoryItem' => $Category]);
            }
            return abort(404);
        }
        return abort(302);
    }
    public function itemCategory($categorySlug)
    {
        # code...
        $category = Categoryitem::where('slugCategory', $categorySlug)
            ->with(['categoryhasitem', 'categoryhasitem.itemhasimages', 'categoryhasitem.shopofitem'])
            ->get();
        //return $category;
        return view('categoryListItem', ['itemCategory' => $category]);
    }
    public function shopingCart()
    {
        # code...
        $itemCart = ChartItem::where('user_id', Auth::id())
            ->where('chek_out', 0)
            ->where('wait_payout', 0)
            ->with(['charthasuser', 'charthasitem'])
            ->get();
        //return $itemCart;
        return view('shopping-cart', ['ItemCart' => $itemCart]);
    }
    public function shopingCartDell($id)
    {
        # code...
        ChartItem::where('user_id', Auth::id())
            ->where('id',$id)
            ->where('chek_out', 0)
            ->where('wait_payout', 0)
            ->delete();
        //return $itemCart;
        // return view('shopping-cart', ['ItemCart' => $itemCart]);
        return redirect()->back();

    }
    public function checkOut(Request $request, BankMarket $bankMarket)
    {
        # code...
        if ($request['idChart'] == '') {
            return redirect('/');
        }
        $itemCart =  ChartItem::where('user_id', Auth::id())
            ->where(function ($query) use ($request) {
                foreach ($request['idChart'] as $value) {
                    $query->orWhere('id', $value);
                }
            })->with(['charthasitem', 'charthasitem.itemhasimages'])
            //->select('shop_seller_id', DB::raw('count(distinct shop_seller_id) as total'))
            //->select('shop_seller_id', DB::raw('count(*) as total'))
            //->groupBy('shop_seller_id')
            ->get();
        $countseller = DB::table('chart_items')
            ->where('user_id', Auth::id())
            ->where(function ($query) use ($request) {
                foreach ($request['idChart'] as $value) {
                    $query->orWhere('id', $value);
                }
            })
            ->get(DB::raw('count(DISTINCT shop_seller_id) as countseller'));
        //$dataJson = json_encode($countseller,true);
        //return $dataJson;
        $Countseller = 0;
        foreach ($countseller as $CountSeller) {
            $Countseller = $CountSeller->countseller;
        }
        //return $itemCart;
        //return count($itemCart['shop_seller_id']);
        $bankMarket = $bankMarket->where('DefaultBankMarket', 1)->first();
        $shippingList = ShippingList::where('user_id', Auth::id())->get();
        return view('checkout', ['Shipping' => $shippingList, 'itemCart' => $itemCart, 'bankMarket' => $bankMarket, 'countseller' => $Countseller]);
    }
    public function checkOutProses(Request $request, BankMarket $bankMarket)
    {
        # code...
        $this->validate($request, [
            'itemchart'     => 'required',
            'amountPay'     => 'required',
            'idShipping'    => 'required',
            'paymentMethod' => 'required',
            'TnC'           => 'required',
        ]);
        //return $request;
        $chartItem = ChartItem::where('user_id', Auth::id())
            ->where(function ($query) use ($request) {
                foreach ($request['itemchart'] as $value) {
                    $query->orWhere('id', $value);
                }
            });
        $chekCart = $chartItem->get();
        if ($chekCart[0]['wait_payout'] != 0) {
            return "Cart Item Sudah Memiliki Tagihan";
        }
        $trxLog = TrxLog::create([
            'user_id'           => Auth::id(),
            'amountPay'         => $request['amountPay'],
            'shipping_list_id'  => $request['idShipping'],
            'bank_market_id'    => $request['paymentMethod'],
        ]);


        $chartItem->update(['chek_out' => 1, 'wait_payout' => $trxLog['id']]);
        $itemCart =  ChartItem::where('user_id', Auth::id())
            ->where(function ($query) use ($request) {
                foreach ($request['itemchart'] as $value) {
                    $query->orWhere('id', $value);
                }
            })->with(['charthasitem', 'charthasitem.itemhasimages'])
            ->get();
        //return $itemCart;
        foreach ($itemCart as $cartItem) {
            LogOrderSeller::create([
                'trx_log_id'        => $trxLog['id'],
                'item_id'           => $cartItem['item_id'],
                'price_order'       => $cartItem['charthasitem']['priceItem'],
                'qty_itemcart'      => $cartItem['qty_item'],
                'shop_seller_id'    => $cartItem['shop_seller_id'],
                'user_id'           => Auth::id(),
            ]);
        }

        $bankMarket = $bankMarket->where('id', $request['paymentMethod'])->first();
        return redirect(route('invoice.select', $trxLog['id']));
        //return view('Invoice',['itemCart'=>$itemCart,'bankMarket'=>$bankMarket,'TrxLog'=>$trxLog]);
    }
    public function orderList()
    {
        # code...
        //return 'my order';
        $trxOrder = TrxLog::where('user_id', Auth::id())
            ->with(['trxorder', 'shippingid'])
            ->get();
        //return $trxOrder;
        return view('listOrder', ['TRXorder' => $trxOrder]);
    }
    public function orderSelectList($id)
    {
        # code...
        $trxOrder = TrxLog::where('user_id', Auth::id())
            ->where('id', $id)
            ->with(['trxorder', 'trxorder.logorderhasitem', 'trxorder.logorderhasitem.shopofitem', 'shippingid'])
            ->get();
        //return $trxOrder;
        return view('statusOrder', ['TrxOrder' => $trxOrder]);
    }
    public function orderConfirmAccept(Request $request)
    {
        # code...
        //return $request;
        $idLogOrderItem = $request['idOrderAccept'];
        LogOrderSeller::where('id', $idLogOrderItem)->where('user_id', Auth::id())->update(['status_order' => 3]);
        return redirect()->back()->with('success', 'Accept Item Order Success !!!');
    }
    public function checkoutPayout()
    {
        # code...
        return 'data';
    }
    public function contact()
    {
        # code...
        return view('contact');
    }
    public function about()
    {
        # code...
        return view('about');
    }
    public function addChartMembers(Request $request)
    {
        # code...
        //return $request;
        $item_id = $request['item_id'];
        $shop_id = $request['shop_id'];
        $user_id = Auth::id();
        //return $user_id;
        $getQtyChart = ChartItem::where('chek_out', 0)
            ->where('wait_payout', 0)
            ->where('user_id', $user_id)
            ->where('item_id', $item_id)
            ->first();
        //return $getQtyChart;
        $updateQty = $getQtyChart['qty_item'] + $request['qty'];
        ChartItem::updateOrCreate(
            [
                'chek_out'          => 0,
                'wait_payout'       => 0,
                'shop_seller_id'    => $shop_id,
                'user_id'           => $user_id,
                'item_id'           => $item_id,
            ],
            ['qty_item' => $updateQty]
        );
        $Cart = ChartItem::where('user_id', $user_id)
            ->where('chek_out', 0)
            ->where('wait_payout', 0)
            ->with(['charthasuser', 'charthasitem', 'charthasitem.itemhasimages'])
            ->orderBy('updated_at', 'DESC')
            ->limit(2)

            ->get();
        return $Cart;
    }
    public function addShippingList(Request $request)
    {
        # code...
        //return $request;
        ShippingList::create([
            'user_id'       =>  Auth::id(),
            'nameShipping'  =>  $request['shippingName'],
            'fname'         =>  $request['fname'],
            'lname'         =>  $request['lname'],
            'address'       =>  $request['address'],
            'kab'           =>  $request['kab'],
            'kec'           =>  $request['kec'],
            'kel'           =>  $request['kel'],
            'phone'         =>  $request['phone'],
        ]);
        return redirect()->back()->with('success', 'Success Add Shipping');
    }
    public function invoiceList()
    {
        # code...
        $invoice = TrxLog::where('user_id', Auth::id())
            ->with(['itempayout', 'shippingid'])
            ->get();
        //return $invoice;
        return view('listInvoice', ['Invoice' => $invoice]);
    }
    public function invoiceSelect($idTrxLog)
    {
        # code...
        $trxlog = TrxLog::where('user_id', Auth::id())->where('id', $idTrxLog)->first();
        $itemCart =  ChartItem::where('user_id', Auth::id())
            ->where('wait_payout', $idTrxLog)
            ->with(['charthasuser', 'shopofitem', 'charthasitem', 'charthasitem', 'cartpayout.shippingid', 'cartpayout.paymentmethod'])
            ->orderBy('shop_seller_id', 'asc')
            ->get();
        $countseller = DB::table('chart_items')
            ->where('wait_payout', $idTrxLog)
            ->get(DB::raw('count(DISTINCT shop_seller_id) as countseller'));
        //$dataJson = json_encode($countseller,true);
        //return $dataJson;
        $Countseller = 0;
        foreach ($countseller as $CountSeller) {
            $Countseller = $CountSeller->countseller;
        }
        //inibro
        //return $itemCart;
        $bankMarket = BankMarket::where('DefaultBankMarket', 1)->first();
        return view('Invoice', ['itemCart' => $itemCart, 'bankMarket' => $bankMarket, 'TrxLog' => $trxlog, 'countseller' => $Countseller]);
    }

    public function userLogin()
    {
        # code...
        return view('marketLogin');
    }
    public function accountInfo()
    {
        # code...
        $user_id = Auth::id();
        $user = User::with(['userhasprofile', 'userhasshipping'])->find($user_id);
        //return $user;
        return view('accountInfo', ['User' => $user]);
        //return User::all();

    }
    public function postAccountInfo(Request $request)
    {
        # code...
        //return $request;
        Profile::updateOrCreate([
            'user_id'       => Auth::id(),
            'nameUser'      => $request['name'],
            'address'       => $request['address'],
            'address1'      => $request['address1'],
            'prov'          => $request['prov'],
            'kota'          => $request['kota'],
            'kec'           => $request['kec'],
            'desa'          => $request['desa'],
            'postalCode'    => $request['postal'],
        ]);
        return redirect()->back()->with('success', 'profile success');
    }
    public function changePassword(Request $request)
    {
        # code...
        //return $request;
        if (Hash::check($request['oldPassword'], auth()->user()->password)) {
            // return 'password sama';
            User::find(Auth::id())->update(['password' => Hash::make($request->newPassword)]);
            return redirect()->back()->with('success', 'Change Password Success !!!');
        }
        //return redirect()->back()->with('warning', 'Failed Change Password !!!');
        dd('Old Password Not Match');
        //;
    }
    public function accountBecomeSeller()
    {
        # code...
        $user = User::find(Auth::id());
        $user->assignRole('seller');
        return redirect(route('account.info'));
    }
    static public function countCategoryItem($categoryitem_id)
    {
        # code...
        $item = Item::where('categoryitem_id', $categoryitem_id);
        return $item->count();
    }
    static public function getListCart()
    {
        # code...
        $cart = ChartItem::where('user_id', Auth::id())
            ->where('chek_out', 0)
            ->with(['charthasitem', 'charthasitem.itemhasimages'])
            ->orderBy('updated_at', 'DESC')
            ->limit(2)
            ->get();
        return $cart;
    }
}
