<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Balance;
use App\Model\Categoryitem;
use App\Model\ChartItem;
use App\Model\Item;
use App\Model\Itemcolor;
use App\Model\Itemhascolor;
use App\Model\Itemhasimage;
use App\Model\Itemtype;
use App\Model\LogBalance;
use App\Model\LogOrderSeller;
use App\Model\LogReqWithdraw;
use App\Model\ShopSeller;
use App\Model\TrxLog;
use App\User;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    //
    public $user;
    public $item;
    public $category;
    public $itemType;
    public $itemColor;
    public $itemHasColor;
    public $itemHasImage;

    public function __construct()
    {
        $this->user         = new User();
        $this->item         = new Item();
        $this->category     = new Categoryitem();
        $this->itemType     = new Itemtype();
        $this->itemColor    = new Itemcolor();
        $this->itemHasColor = new Itemhascolor();
        $this->itemHasImage = new Itemhasimage();
        $this->pathItem = '/images/items/';
    }
    public function index()
    {
        # code...
        $shop = ShopSeller::where('user_id', Auth::id())->first();
        $Item = Item::where('user_id', Auth::id())->get();
        //return $Item;
        $LogOrderProses = LogOrderSeller::where('shop_seller_id', $shop['id'])
            ->where('status_order', 2)
            ->get();
        $LogOrderDone   = LogOrderSeller::where('shop_seller_id', $shop['id'])
            ->where('status_order', 3)
            ->get();
        $LogSaldo       = LogBalance::where('user_id', Auth::id())
            ->where('kredit', 1)
            ->get();

        /*$LogGraph = DB::table('log_order_sellers')
            ->where('shop_seller_id',$shop['id'])
            ->select('created_at')
            ->groupBy('created_at')
            ->pluck('created_at',DB::raw('count(qty_itemcart)'))->all();*/
        /*$LogGraph = DB::table('log_order_sellers')->where('shop_seller_id',$shop['id'])
            ->orderBy('created_at')
            //->groupBy('created_at')
            ->pluck('created_at','qty_itemcart');*/
        $LogGraph = DB::table('log_order_sellers')
            ->where('shop_seller_id', $shop['id'])
            ->select(DB::raw('sum(qty_itemcart) as sold'), DB::raw('date(created_at) as dates'))
            ->groupBy('dates')
            ->orderBy('dates', 'asc')
            ->get();
        //return $LogGraph;
        $Dates = [];
        $Sold = [];
        //$decode = json_decode($LogGraph);
        //dd($decode);
        foreach ($LogGraph as $logGraph) {
            //return $logGraph->dates;
            $Dates[] = $logGraph->dates;
            $Sold[] = $logGraph->sold;
        }
        //return $Dates;
        //return $Sold;
        //return $LogOrderDone;
        return view('Back.SellerIndex', [
            'Item'          =>  $Item,
            'LogOrderProses' =>  $LogOrderProses,
            'LogOrderDone'  =>  $LogOrderDone,
            'LogSaldo'      =>  $LogSaldo,
            'Dates'         =>  $Dates,
            'Sold'          =>  $Sold
        ]);
    }
    public function ItemSell()
    {
        //return $this->item->get();
        # code...
        $item = $this->item->where('user_id', Auth::id())
            //->join('categoryitems','items.categoryitem_id','categoryitems.id')
            //->join('itemtypes','items.itemtype_id','itemtypes.id')
            //->join('itemhasimages','items.id','itemhasimages.item_id')
            ->with('itemcategories')
            ->with('itemtypes')
            ->with('itemhasimages')
            ->get();
        //return $item;
        return view('Back.SellerItem', ['Item' => $item]);
    }
    public function AddItemSell()
    {
        # code...
        //$seller     = ['seller'=>'true'];
        $user       = $this->user->find(Auth::id());
        $category   = $this->category->get();
        $itemType   = $this->itemType->get();
        $itemColor  = $this->itemColor->get();
        $shopStatus = ShopSeller::where('user_id', Auth::id())->first('verified');
        //return $shopStatus['verified'];
        //return $category;
        return view('Back.SellerItemAdd', [
            'User'      => $user,
            'itemType'  => $itemType,
            'Category'  => $category,
            'ItemColor' => $itemColor,
            'Seller'    => $shopStatus
        ]);
    }
    public function StoreItemSell(Request $request)
    {
        # code...
        $user = Auth::user();
        return $request;
        //return $user;
        //return count($request->file('imgItem'));
        // $this->validate($request, [
        //     'itemTitle'     => 'required',
        //     'priceItem'     => 'required',
        //     'qtyItem'       => 'required',
        //     'categoryItem'  => 'required',
        //     'typeItem'      => 'required',
        //     'itemDesc'      => 'required',
        //     'color'         => 'required',
        //     'imgItem'       => 'required',
        // ]);
        // $slug = strtolower(str_replace(" ", "-", Auth::user()['name'] . "-" . $request['itemTitle']));
        // $item = $this->item->create([
        //     'nameItem'          => $request['itemTitle'],
        //     'slugNameItem'      => $slug,
        //     'descriptionItem'   => $request['itemDesc'],
        //     'priceItem'         => $request['priceItem'],
        //     'qtyItem'           => $request['qtyItem'],
        //     'user_id'           => Auth::id(),
        //     'categoryitem_id'   => $request['categoryItem'],
        //     'itemtype_id'       => $request['typeItem'],
        // ]);
        // foreach ($request['color'] as $color) {
        //     $this->itemHasColor->create([
        //         'item_id'       => $item['id'],
        //         'itemcolor_id'  => $color,
        //     ]);
        // }
        //$files = [];
        return $request->file('imgItem');
        $totalfile = count($request->file('imgItem'));
        for ($i=0; $i < $totalfile; $i++) { 
            # code...
            //echo '1';
            echo "The number is: $i <br>";
        }
        // foreach ($request->file('imgItem') as $file) {
        //     return $file;
        //     $fileName = Carbon::now()->timestamp . '_' . 'user_' . $user['name'] . uniqid() . '.' . $file->getClientOriginalExtension();
        //     Image::make($file)->save($this->pathItem . '/' . $fileName);
        //     $urlPath = '/' . $this->pathItem . $fileName;
        //     $this->itemHasImage->create([
        //         'item_id'   => 'okoko',
        //         'imgItems'  => $urlPath,
        //     ]);
        // }
        // return redirect()->back()->with('success', 'Success Add Item');
    }
    public function EditItemSell(Item $item)
    {
        # code...
        $detailItem = $item->where('id', $item['id'])
            ->with('itemhascolor')
            //->with('itemColor')
            ->with('itemcategories')
            ->with('itemtypes')
            ->with('itemhasimages')
            ->firstOrFail();
        $user       = $this->user->find(Auth::id());
        $category   = $this->category->get();
        $itemType   = $this->itemType->get();
        $itemColor  = $this->itemColor->get();
        //return $detailItem;
        return view('Back.SellerItemEdit', [
            'User'          => $user,
            'itemType'      => $itemType,
            'Category'      => $category,
            'ItemColor'     => $itemColor,
            'detailItem'    => $detailItem
        ]);
    }
    public function UpdateItemSell(Item $item, Request $request)
    {
        # code...
        //return $request;
        //return $item['id'];
        if ($item['id'] != $request['item_id']) {
            return 'dont allow this action';
        }
        $this->validate($request, [
            'item_id'       => 'required',
            'itemTitle'     => 'required',
            'priceItem'     => 'required',
            'qtyItem'       => 'required',
            'categoryItem'  => 'required',
            'typeItem'      => 'required',
            'itemDesc'      => 'required',
            //'idImgItem'     =>'required',
            'color'         => 'required',
        ]);
        $slug = strtolower(str_replace(" ", "-", Auth::user()['name'] . "-" . $request['itemTitle']));
        $item->update([
            'nameItem'          => $request['itemTitle'],
            'slugNameItem'      => $slug,
            'descriptionItem'   => $request['itemDesc'],
            'priceItem'         => $request['priceItem'],
            'qtyItem'           => $request['qtyItem'],
            'user_id'           => Auth::id(),
            'categoryitem_id'   => $request['categoryItem'],
            'itemtype_id'       => $request['typeItem'],
        ]);
        //hapus item has color
        $this->itemHasColor->where('item_id', $item['id'])->forceDelete();
        //create lagi item has color
        foreach ($request['color'] as $color) {
            $this->itemHasColor->create([
                'itemcolor_id'  => $color,
                'item_id'       => $item['id'],
            ]);
        }
        // cek apakah ada file lama yang di hapus
        if ($request['actionDellItem'] == 0) {
            foreach ($request['idDellImgItem'] as $idImgItem) {
                //echo "tidak sama ->".$imgExisting['id']." <br>";
                $this->itemHasImage->where('id', $idImgItem)->delete();
            }
        }
        // jika ada upload file foto baru
        if (isset($request['imgItem'])) {
            foreach ($request->file('imgItem') as $file) {
                $fileName = Carbon::now()->timestamp . '_' . 'user_' . Auth::user()['name'] . uniqid() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->save($this->pathItem . '/' . $fileName);
                $urlPath = '/' . $this->pathItem . $fileName;
                $this->itemHasImage->create([
                    'item_id'   => $item['id'],
                    'imgItems'  => $urlPath,
                ]);
            }
        }
        return redirect()->route('seller.Item')->with('success', 'Success Edit Item');
    }
    public function dellItemSell(Request $request)
    {
        # code...
        $item = $this->item->find($request['idDellItem']);
        $item->delete();
        return redirect()->back()->with('warning', 'Success Delete Item');
    }
    public function shopSeller()
    {
        # code...
        //return 'shopSeller';
        $shopSeller = ShopSeller::where('user_id', Auth::id())->first();
        //return $shopSeller->count();
        $item       = Item::where('user_id', Auth::id())->count();
        //return $shopSeller;
        return view('Back.SellerShop', ['ShopSeller' => $shopSeller, 'Item' => $item]);
    }
    public function settupShop(Request $request)
    {
        # code...
        //return $request;
        $this->validate($request, [
            'shopName'      => 'required',
            'rekening'      => 'required',
            'bank'          => 'required',
            'address1'      => 'required',
            'address2'      => 'required',
            'handphone'     => 'required',
            'kabupaten'     => 'required',
            'kecamatan'     => 'required',
            'keluarahan'    => 'required',
        ]);
        $slug = strtolower(str_replace(" ", "-", Auth::user()['name'] . "-" . $request['shopName']));
        ShopSeller::updateOrCreate(
            ['user_id' => Auth::id()],
            [

                'nameShop'          => $request['shopName'],
                'slugShop'          => $slug,
                'nomorRekening'     => $request['rekening'],
                'bank'              => $request['bank'],
                'addressShop'       => $request['address1'],
                'addressShop1'      => $request['address2'],
                'handPhone'         => $request['handphone'],
                'kabupatenShop'     => $request['kabupaten'],
                'kecamatanShop'     => $request['kecamatan'],
                'kelurahanShop'     => $request['keluarahan'],

            ]
        );
        return redirect()->back()->with('success', 'Success Settup Shop');
    }
    public function listOrder()
    {
        # code...
        /*$trxLog = TrxLog::where('user_id',Auth::id())
            ->with(['trxuser','itempayout','shippingid'])
            ->get();
        return $trxLog;*/
        //$user = Auth::user()->usershop();
        $shop = ShopSeller::where('user_id', Auth::id());
        if ($shop->count() == 0) {
            //return 'ksong';
            //return "akun kamu belum memiliki profile";
            //seller.shop
            return redirect(route('seller.shop'))->with('warning', 'Please Insert Your Profile');
        }
        $shop = $shop->first();
        //return count($shop);
        //if($shop->count()==0)
        //return $shop;
        /*
        $orderLog = ChartItem::where('shop_seller_id',$shop['id'])
            ->where('chek_out',1)
            ->with(['charthasitem','charthasuser','cartpayout','cartpayout.shippingid','shopofitem'])
            ->get();
        */
        $orderLog = ChartItem::where('shop_seller_id', $shop['id'])
            ->distinct('wait_payout')
            ->pluck('wait_payout');
        //return $orderLog;
        /*$dataOrderLog = ChartItem::where('chek_out',1)
            ->where('shop_seller_id',$shop['id'])
            ->where(function($query) use ($orderLog) {
            foreach ($orderLog as $value) {
                $query->orWhere('wait_payout',$value);
            }
        })->unique(['wait_payout']);*/
        //return count($orderLog);
        if (count($orderLog) == 0) {
            //seller.Item
            return redirect(route('seller'))->with('warning', 'You Dont Have List Order');
        }
        $dataOrderLog = TrxLog::where(function ($query) use ($orderLog) {
            foreach ($orderLog as $value) {
                $query->orWhere('id', $value);
            }
        })->with(['trxuser', 'shippingid'])
            ->get();
        //return $dataOrderLog;
        return view('Back.SellerListOrder', ['OrderLog' => $dataOrderLog]);
    }
    public function SelectlistOrder($id)
    {
        # code...
        $shop = ShopSeller::where('user_id', Auth::id())->first();
        $log = LogOrderSeller::where('trx_log_id', $id)
            ->where('shop_seller_id', $shop['id'])
            ->with(['logorderhasitem', 'trx.shippingid'])
            ->get();
        //return $log;
        return view('Back.SellerSelectOrder', ['Log' => $log]);
    }
    public function SelectPostConfirmOrder(Request $request)
    {
        # code...
        //return $request;
        $shop = ShopSeller::where('user_id', Auth::id())->first();
        LogOrderSeller::where('trx_log_id', $request['idOrder'])
            ->where('shop_seller_id', $shop['id'])
            ->update(['status_order' => 2]);
        return redirect()->back()->with('success', 'Order Success Confirmasi');
    }
    public function sellerClaimBalance(Request $request)
    {
        # code...
        //return $request;
        //idOrderDone
        $shop = ShopSeller::where('user_id', Auth::id())->first();
        $trxOrder = LogOrderSeller::where('trx_log_id', $request['idOrderDone'])
            ->where('shop_seller_id', $shop['id'])
            ->where('status_order', 3)
            ->where('log_balance_id', null)
            ->get();
        if (count($trxOrder) == 0) {
            return redirect()->back()->with('warning', 'Balance Exsisting To Your Account !!!');
        }
        $balance = 0;
        foreach ($trxOrder as $trx) {
            $balance += $trx['price_order'] * $trx['qty_itemcart'];
            $logBalance = LogBalance::create([
                'amount'                => $trx['price_order'] * $trx['qty_itemcart'],
                'kredit'                => 1,
                'log_order_seller_id'   => $trx['id'],
                'item_id'               => $trx['item_id'],
                'user_id'               => Auth::id(),
            ]);

            LogOrderSeller::where('trx_log_id', $request['idOrderDone'])
                ->where('shop_seller_id', $shop['id'])
                ->where('status_order', 3)
                ->where('log_balance_id', null)
                ->where('id', $trx['id'])
                ->update(['log_balance_id' => $logBalance['id']]);
        }
        $logBalance->balanceuser()->updateOrCreate(['user_id' => Auth::id()], ['balanceAmount' => $balance]);
        return redirect()->back()->with('success', 'Balance Has Succsess Claim To Your Account !!!');
    }
    public function sellerBalance()
    {
        # code...
        //return 'Balance Seller';
        $shop = ShopSeller::where('user_id', Auth::id())->first();
        $balance = Balance::where('user_id', Auth::id())->first();
        //return $balance;
        $logSeller = LogOrderSeller::where('shop_seller_id', $shop['id'])
            ->where('status_order', 3)
            ->with(['logorderhasitem', 'logorderhasitem.itemhasimages', 'orderby'])
            ->orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        //return $logSeller;
        return view('Back.SellerBalance', ['Balance' => $balance, 'LogSeller' => $logSeller]);
    }
    public function sellerBalanceWD()
    {
        # code...
        //return 'WD ReqUest ';
        $balance = Balance::where('user_id', Auth::id())
            ->with(['userhasbalance', 'shop'])
            ->first();
        //return $balance;
        $logWD = LogReqWithdraw::where('user_id', Auth::id())->get();
        //return $logWD;
        return view('Back.SellerWD', ['Balance' => $balance, 'LogWD' => $logWD]);
    }
    public function sellerBalanceReqWD(Request $request)
    {
        # code...
        //return $request['valueWD'];
        $hasBalance = Balance::where('user_id', Auth::id())->first();
        if ($request['valueWD'] >= 10000) {
            if ($hasBalance['balanceAmount'] <= $request['valueWD']) {
                //return "You Can't Request WD More The Your Balance";
                return redirect()->back()->with('warning', 'You Cant Request WD More The Your Balance !!!');
            }
            //return "do proses";
            //return $request;
            $valueWD = $request['valueWD'];
            $user =  User::where('id', Auth::id())
                ->with(['usergetshop'])
                ->first();
            //return $user;
            $logWD = LogReqWithdraw::create([
                'wdAmount'      => $valueWD,
                'accountBank'   => $user['usergetshop']['nomorRekening'],
                'nameBank'      => $user['usergetshop']['bank'],
                'user_id'       => Auth::id(),
            ]);
            LogBalance::create([
                'amount'                => $valueWD,
                'debit'                 => 1,
                'log_req_withdraw_id'   => $logWD['id'],
                'user_id'               => Auth::id(),
            ]);
            return Balance::where('user_id', Auth::id())->update(['balanceAmount' => $hasBalance['balanceAmount'] - $valueWD]);
        } else {
            //return "Lebih Kecil Dari 10k";
            return redirect()->back()->with('warning', 'You Cant Request WD Less Than 10.000 !!!');
        }
    }
    public function sellerBalanceLog()
    {
        # code...
        $Balance = Balance::where('user_id', Auth::id())->get();
        $logBalance = LogBalance::where('user_id', Auth::id())->get();
        //return $logBalance;
        return view('Back.SellerBalanceLog', ['LogBalance' => $logBalance]);
    }
}
