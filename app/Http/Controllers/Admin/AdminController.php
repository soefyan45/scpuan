<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Categoryitem;
use App\Model\Item;
use App\Model\Itemcolor;
use App\Model\Itemtype;
use App\Model\LogReqWithdraw;
use App\Model\Profile;
use App\Model\ShopSeller;
use App\Model\TrxLog;
use App\User;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public $profile;
    public $user;
    public $category;
    public $itemTypes;
    public $itemColor;
    public $shopSeller;
    public function __construct()
    {
        $this->profile      = new Profile();
        $this->user         = new User();
        $this->categoryItem = new Categoryitem();
        $this->itemTypes    = new Itemtype();
        $this->item         = new Item();
        $this->itemColor    = new Itemcolor();
        $this->trxLog       = new TrxLog();
        $this->shopSeller   = new ShopSeller();
        $this->pathCategoty = 'images/category/';
    }
    public function Index()
    {
        # code...
        //return Auth::id();
        $users      = $this->user->all();
        $sellers    = $this->shopSeller->all();
        $items      = $this->item->all();
        $trxLogs    = $this->trxLog->all();
        //return $users;
        return view('Back.Admin',[
            'Users'         => $users,
            'Sellers'       => $sellers,
            'Items'         => $items,
            'TrxLogs'       => $trxLogs
            ]);
    }
    public function profile()
    {
        $user = $this->user->with(['userhasprofile'])
            ->find(Auth::id());
        //return $user;
        return view('Back.AdminProfile',['User'=>$user]);
    }
    public function postProfile(Request $request)
    {
        # code...
        //return $request;
        /*$user = User::with('userhasprofile')
            ->find(Auth::id());*/
        //$user->update(['email'=>$request['email']]);
        $user = User::updateOrCreate(
            ['id'=>Auth::id()],[
            'email'=>$request['email']
            ]);
        //return $user;
        $user  = User::find(Auth::id())->userhasprofile()
            ->updateOrCreate(['user_id'=>Auth::id()],
            [
                'nameUser'      =>  $request['nameProfile'],
                'address'       =>  $request['address'],
                'address1'      =>  $request['address1'],
                'prov'          =>  $request['prov'],
                'kota'          =>  $request['kota'],
                'kec'           =>  $request['kec'],
                'desa'          =>  $request['desa'],
            ]);
        //return $user;
        return redirect()->back()->with('success', 'Success Change Profile');

    }
    public function Category()
    {
        # code...
        $user       = $this->user->find(Auth::id());
        $category   = $this->categoryItem->get();
        return view('Back.AdminCategory',['User'=>$user,'Category'=>$category]);
    }
    public function storeCategory(Request $request)
    {
        # code...
        $this->validate($request,[
            'categoryName'  => 'required|min:4',
            'imgCategory'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $slug               = strtolower(str_replace(" ","-",$request->categoryName));
        $file = $request->imgCategory;
        $fileName = Carbon::now()->timestamp . '_'.'arsyad_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($this->pathCategoty . '/' . $fileName);
        $urlPath = '/'.$this->pathCategoty.$fileName;
        //return $urlPath;
        $this->categoryItem->create([
            'nameCategory'  => $request->categoryName,
            'slugCategory'  => $slug,
            'imgCategory'   => $urlPath,
        ]);
        return redirect()->back()->with('success', 'Success Save Category Item');
    }
    public function editCategory(Request $request,Categoryitem $categoryitem)
    {
        # code... action edit
        $this->validate($request,[
            'categoryNameEdit'      => 'required|min:4',
            'statusCategoryEdit'    => 'required',
        ]);
        $slug   = strtolower(str_replace(" ","-",$request->categoryNameEdit));
        if($request->pictCategoryEdit==null){
            //return 'gambar tidak di update';
            $categoryitem->update([
                'nameCategory'      => $request->categoryNameEdit,
                'slugCategory'      => $slug,
                'statusCategory'    => $request->statusCategoryEdit,
            ]);
            /*
            Categoryitem::update([
                'nameCategory'      => $request->categoryNameEdit,
                'slugCategory'      => $slug,
                'statusCategory'    => $request->statusCategoryEdit,
            ]);
            */
            return redirect()->back()->with('success', 'Success Edit Category Item');
        }
        $this->validate($request,[
            'pictCategoryEdit'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $file = $request->pictCategoryEdit;
        $fileName = Carbon::now()->timestamp . '_'.'arsyad_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($this->pathCategoty . '/' . $fileName);
        $urlPath = '/'.$this->pathCategoty.$fileName;
        //return $urlPath;
        $categoryitem->update([
            'nameCategory'      => $request->categoryNameEdit,
            'slugCategory'      => $slug,
            'imgCategory'       => $urlPath,
            'statusCategory'    => $request->statusCategoryEdit,
        ]);
        return redirect()->back()->with('success', 'Success Edit Category Item');
    }
    public function dellCategory(Request $request,Categoryitem $categoryitem)
    {
        # code... action delete category item
        $this->validate($request,[
            'idDellCategory' => 'required',
        ]);
        if($request->idDellCategory==$categoryitem['id']){
            $categoryitem->delete();
            return redirect()->back()->with('success', 'Your data category  item success delete');
        }
        return redirect()->back()->with('success', 'Please check Your Data !!!');
    }
    public function Itemtypes()
    {
        # code...
        $user       = $this->user->find(Auth::id());
        $itemType   = $this->itemTypes->get();
        return view('Back.AdminItemType',['User'=>$user,'ItemType'=>$itemType]);
    }
    public function storeItemtypes(Request $request,Itemtype $itemType)
    {
        # code...
        //return $request;
        $this->validate($request,[
            'typeItemName' => 'required|min:4',
        ]);
        $slug   = strtolower(str_replace(" ","-",$request->typeItemName));
        $itemType->create(
            [
                'nameItemType'=>$request->typeItemName,
                'slugNamaItemType'=>$slug
            ]
        );
        return redirect()->back()->with('success', 'Success add data Type item');
    }
    public function editItemtypes(Request $request,Itemtype $itemtype)
    {
        $this->validate($request,[
            'idItemType'            => 'required',
            'nameItemType'          => 'required|min:4',
            'statusNamaItemType'    => 'required',
        ]);
        $slug   = strtolower(str_replace(" ","-",$request->nameItemType));
        //dd($itemtype['id']);
        if ($request->idItemType==$itemtype['id'])
        {
            $itemtype->update(
                [
                    'nameItemType'          =>$request->nameItemType,
                    'slugNamaItemType'      =>$slug,
                    'statusNamaItemType'    =>$request->statusNamaItemType
                ]
            );
            return redirect()->back()->with('success', 'Success update data Type item');
        }
        //return 'data berbeda';
        return redirect()->back()->with('danger', 'Failed update data Type item');
    }
    public function dellItemtypes(Request $request,Itemtype $itemtype)
    {
        $this->validate($request,['idDellTypeItem'=>'required']);
        if ($request->idDellTypeItem==$itemtype['id'])
        {
            $itemtype->delete();
            return redirect()->back()->with('success', 'Your data type item success delete');
        }
        return redirect()->back()->with('success', 'Please check Your Data !!!');
    }
    public function colorItem()
    {
        $user       = $this->user->find(Auth::id());
        $colorItem  = $this->itemColor->get();
        return view('Back.AdminItemColor',['User'=>$user,'ColorItem'=>$colorItem]);

    }
    public function storeColorItem(Request $request,Itemcolor $itemcolor)
    {
        //dd($request);
        $this->validate($request,[
            'colorItemName'=>'required',
            'colorItemCode'=>'required'
        ]);
        $slug   = strtolower(str_replace(" ","-",$request->colorItemName));
        $itemcolor->create([
            'colorItems'        => $request->colorItemName,
            'colorCode'         => $request->colorItemCode,
            'slugColorItems'    => $slug
        ]);
        return redirect()->back()->with('success', 'Success Add Data Color Item');
    }
    public function editColorItem(Request $request,Itemcolor $itemcolor)
    {
        # code...
        //return $itemcolor;
        //return $request;
        $this->validate($request,[
            'colorItemNameEdit'     =>'required',
            'colorItemCodeEdit'     =>'required',
            'statuscolorItemName'   =>'required'
        ]);
        $slug   = strtolower(str_replace(" ","-",$request->colorItemNameEdit));
        if($request['idItemColor']==$itemcolor['id'])
        {
            //return 'itemColor Id sama';
            $itemcolor->update([
                'colorItems'        => $request->colorItemNameEdit,
                'colorCode'         => $request->colorItemCodeEdit,
                'statusColorItems'  => $request->statuscolorItemName,
                'slugColorItems'    => $slug,
            ]);
            return redirect()->back()->with('success', 'Success Edit Data Color Item');
        }
        //return 'item id tidak sama';
        return redirect()->back()->with('warning', 'Please Check Your Data');
    }
    public function dellColorItem(Request $request,Itemcolor $itemcolor)
    {
        # code...
        $this->validate($request,[
            'idDellColorItem'     =>'required',
        ]);
        if($request['idDellColorItem']==$itemcolor['id'])
        {
            //return 'itemColor Id sama';
            $itemcolor->delete();
            return redirect()->back()->with('success', 'Success Delete Data Color Item');
        }
        return redirect()->back()->with('warning', 'Please Check Your Data');
    }
    public function listSellerShop()
    {
        # code...
        //return 1;
        $shopSeller = $this->shopSeller->with('Account')->get();
        //return $shopSeller;
        return view('Back.AdminShopSeller',['ShopSeller'=>$shopSeller]);
    }
    public function listSellerShopVerified(Request $request)
    {
        # code...
        //return $request;
        $this->validate($request,[
            'idShop'     =>'required',
        ]);
        $shopSeller = $this->shopSeller->find($request['idShop']);
        $shopSeller->update(['verified'=>1]);
        return redirect()->back()->with('success', 'Verified Shop Success');
    }
    public function listSellerShopResult($slug)
    {
        # code...
        //return $slug;
        $shop = ShopSeller::where('slugShop',$slug)
            ->with(['Account','hasitem','hasbalance','haslogbalance','haslogseller'])
            ->first();
        //return $shop;
        return view('Back.AdminReportSeller',['Shop'=>$shop]);
    }
    public function paymentConfirm()
    {
        # code...
        $trx = TrxLog::with(['trxuser','shippingid','paymentmethod'])
            ->get();
        //return $trx;
        return view('Back.AdminPaymentConfirm',['Trx'=>$trx]);
    }
    public function ProsesPaymentConfirm(Request $request)
    {
        # code...
        TrxLog::where('id',$request['idPayment'])->update([
            'statusPaidOff' => 1
        ]);
        return redirect()->back()->with('success', 'Success Has Confirm Payment ');
    }
    public function ProsesWithdrawConfirm()
    {
        # code...
        $logWithdraw = LogReqWithdraw::with(['users','hasbalances','hasshop'])->get();
        //return $logWithdraw;
        return view('Back.AdminWDConfirm',['LogWD'=>$logWithdraw]);
    }
    public function PostWithdrawConfirm(Request $request)
    {
        # code...
        //return $request;
        $id = $request['idWd'];
        LogReqWithdraw::where('id',$id)->update(['statusWD'=>2]);
        return redirect()->back()->with('success', 'Success Proses & Flag as Done');

    }
}
