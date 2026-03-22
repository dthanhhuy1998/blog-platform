<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use URL;
use Str;
use Validator;
use Storage;
use Cart;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

// Models
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleToCategory;
use App\Models\District;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductToCategory;
use App\Models\ProductGroup;
use App\Models\ProductToGroup;
use App\Models\ProductDescription;
use App\Models\Staff;
use App\Models\Partner;
use App\Models\Slide;
use App\Models\NemCSTN;
use App\Models\Province;
use App\Models\Ward;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\DistributionSystem;
use App\Models\Voucher;
use App\Services\Voucher\Logic as VoucherLogic;
use App\Enums\VoucherStatus;
use App\Enums\InvoiceStatus;
use App\Services\Settings\Config as ConfigService;

class CatalogController extends Controller
{
    public function homepage() 
    {
        $articles = Article::where('status', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ProductCategory::where('status', 1)->orderBy('id', 'asc')->get();
        $lastedProduct = Product::where('status', 1)->orderBy('created_at', 'desc')->limit(10)->get();
        $staffs = Staff::where('status', 1)->orderBy('sort_order', 'asc')->get();
        $partners = Partner::where('status', 1)->orderBy('sort_order', 'asc')->get();
        $slides = Slide::where('status', 1)->orderBy('sort_order', 'asc')->get();

        $metaConfig['title'] = ConfigService::get('meta_title');
        $metaConfig['description'] = ConfigService::get('meta_description');
        $metaConfig['keyword'] = ConfigService::get('meta_keyword');

        // SEO Meta
        $controller = new Controller();
        $controller->seo_tools(
            $metaConfig['title'],
            strip_tags($metaConfig['description']),
            $metaConfig['keyword'],
            asset('assets/frontend/img/home-thumb.jpg'),
            URL::current()
        );

        return view('catalog.pages.index',
            compact('articles', 'lastedProduct', 'categories', 'staffs', 'partners', 'slides')
        );
    }

    public function promotion()
    {
        $controller = new Controller();
        $controller->seo_tools(
            'Khuyến mãi Tết Mayhome',
            'Tổng hợp ưu đãi Tết với combo quà tặng độc đáo, sẵn sàng giao nhanh trên toàn quốc.',
            'khuyen mai mayhome, qua tet mayhome, uu dai tet',
            asset('public/catalog/assets/img/lazyload.jpg'),
            URL::current()
        );

        return view('catalog.pages.promotion');
    }

    public function article($slug) 
    {
        $article = Article::where('slug', $slug)
        ->first();

        $categories = ArticleCategory::where('status', 1)
        ->get();

        $productGroups = ProductGroup::where('status', 1)->get();

        $productCategories = ProductCategory::where('status', 1)->get();

        // update viewed
        DB::table('article')
        ->where('slug', $slug)
        ->update(['view' => $article->view + 1]);

        $lastedArticle = Article::where('status', 1)
        ->where('id', '<>', $article->id)
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

        // SEO Meta
        $controller = new Controller();
        $imageUrl = !empty($article->image) ? asset('storage/app/' . $article->image) : asset('storage/app/uploads/default.png');
        $controller->seo_tools(
            $article->meta_title,
            $article->meta_description,
            $article->meta_keyword,
            $imageUrl,
            URL::current()
        );

        return view('catalog.pages.article',
            compact('article', 'categories', 'lastedArticle', 'productGroups', 'productCategories')
        );
    }

    public function getAllArticle() 
    {
        $articles = Article::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(12);

        $categories = ArticleCategory::get();

        $keywords = '';
        foreach($categories as $category) {
            $keywords .= Str::slug($category->name, ' ') . ', ';
        }

        $headingTitle =  'Bài viết | Mayhome - Món quà từ thiên nhiên';
        $pageTitle = 'Bài viết';

        // SEO Meta
        $controller = new Controller();
        $imageUrl = !empty($category->image) ? asset('storage/app/' .$category->image) : asset('storage/app/uploads/default.png');
        $controller->seo_tools(
            'Tất cả bài viết của Mayhome',
            'Mayhome luôn cập nhật tin tức và các chương trình khuyến mãi mới nhất dành cho các bạn',
            $keywords,
            asset('public/catalog/assets/img/lazyload.jpg'),
            URL::current()
        );

        return view('catalog.pages.articles',
            compact('headingTitle', 'pageTitle', 'articles')
        );
    }

    public function getArticleByCategory($slug) 
    {
        // get category id
        $category = ArticleCategory::where('slug', $slug)->first();

        // get article to category and fetch data article table
        $articleToCategory = ArticleToCategory::where('category_id', $category->id)
        ->orderBy('created_at', 'desc')
        ->paginate(12);

        // SEO Meta
        $controller = new Controller();
        $imageUrl = !empty($category->image) ? asset('storage/app/' .$category->image) : asset('storage/app/uploads/default.png');
        $controller->seo_tools(
            $category->meta_title,
            $category->meta_description,
            $category->meta_keyword,
            $imageUrl,
            URL::current()
        );

        $pageTitle = $category->name;

        return view('catalog.pages.article-category',
            compact('pageTitle', 'articleToCategory', 'category')
        );
    }

    public function product($slug) 
    {
        $productDescription = ProductDescription::where('slug', $slug)->first();

        if (empty($productDescription)) {
            abort(404);
        }

        $featureds = Product::where('status', 1)
        ->where('featured', 1)
        // ->orderBy('created_at', 'desc')
        ->limit(12)
        ->get();

        $distributionSystems = DistributionSystem::distinct('related_city_code')->pluck('related_city_code');

        $distributionSystemOptions = [];
        if (count($distributionSystems) > 0) {
            foreach($distributionSystems as $matp) {
                $optionValue = Province::select('name')->where('matp', $matp)->first();

                $distributionSystemOptions[] = [
                    'key' => $matp,
                    'value' => $optionValue['name'],
                ];
            }
        }

        // SEO Meta
        $controller = new Controller();
        $imageUrl = !empty($productDescription->product->image) ? asset('storage/app/' . $productDescription->product->image) : asset('storage/app/uploads/default.png');
        $controller->seo_tools(
            $productDescription->meta_title,
            $productDescription->meta_description,
            $productDescription->meta_keyword,
            $imageUrl,
            URL::current()
        );

        return view('catalog.pages.product',
            compact('productDescription', 'featureds', 'distributionSystemOptions')
        );
    }

    public function products() 
    {
        $products = Product::where('status', 1)->orderBy('created_at', 'desc')->paginate(8);
        $categories = ProductCategory::get();

        $keywords = '';
        foreach($categories as $category) {
            $keywords .= Str::slug($category->name, ' ') . ', ';
        }

        $pageTitle = __('All Products');

        // SEO Meta
        $controller = new Controller();
        $controller->seo_tools(
            'Tất cả sản phẩm Nông nghiệp & Thực phẩm | Nguồn hàng chất lượng - Giá tốt',
            'Khám phá danh mục sản phẩm nông nghiệp và thực phẩm đa dạng: nông sản tươi, thực phẩm chế biến, nguyên liệu đầu vào chất lượng cao, phù hợp cho bán lẻ và phân phối.',
            $keywords,
            asset('assets/frontend/img/products-thubnail.png'),
            URL::current()
        );

        return view('catalog.pages.products',
            compact('pageTitle', 'products')
        );
    }

    public function getProductByCategory($slug) 
    {
        $category = ProductCategory::where('slug', $slug)->first();
        $products = $category->products()->where('status', Product::FORSALE)->paginate(20);

        $headingTitle = $category->name . ' | Mayhome - Món quà từ thiên nhiên';
        $pageTitle = $category->name;

        // SEO Meta
        $controller = new Controller();

        $imageUrl = !empty($category->image) ? asset('storage/app/' . $category->image) : asset('storage/app/uploads/default.png');
        $controller->seo_tools(
            $category->meta_title,
            $category->meta_description,
            $category->meta_keyword,
            $imageUrl,
            URL::current()
        );

        return view('catalog.pages.product-category',
            compact('headingTitle', 'pageTitle', 'category', 'products')
        );
    }

    public function getProductByGroup($slug) 
    {
        $group = ProductGroup::where('slug', $slug)->first();
        $products = $group->products()->where('status', Product::FORSALE)->paginate(20);

        $headingTitle = $group->name . ' | Mayhome - Món quà từ thiên nhiên';
        $pageTitle = $group->name;

        // SEO Meta
        $controller = new Controller();

        $imageUrl = !empty($group->image) ? asset('storage/app/' . $group->image) : asset('storage/app/uploads/default.png');
        $controller->seo_tools(
            $group->meta_title,
            $group->meta_description,
            $group->meta_keyword,
            $imageUrl,
            URL::current()
        );

        return view('catalog.pages.product-group',
            compact('headingTitle', 'pageTitle', 'group', 'products')
        );
    }

    public function getClientLogin() 
    {
        $headingTitle = 'Đăng nhập - Đăng ký tài khoản | Mayhome - Món quà từ thiên nhiên';
        $pageTitle = 'Đăng nhập - Đăng ký tài khoản';

        return view('catalog.pages.login',
            compact('headingTitle', 'pageTitle')
        );
    }

    public function postClientRegister(Request $request) 
    {
        $validated = $request->validate([
            'lastName'          => 'required|max:50',
            'firstName'         => 'required|max:50',
            'email'             => 'required|max:150|unique:customer,email',
            'phoneNumber'       => 'required|max:20',
            'userPassword'      => 'required|min:6|max:20',
            'confirmPassword'   => 'required|same:userPassword',
        ],[
            'lastName.required'         => 'Họ không được bỏ trống!',
            'lastName.max'              => 'Họ tối đa 50 ký tự!',
            'firstName.required'        => 'Tên không được bỏ trống!',
            'firstName.max'             => 'Tên tối đa 50 ký tự!',
            'email.required'            => 'Email không được bỏ trống!',
            'email.max'                 => 'Email tối đa 150 ký tự!',
            'email.unique'              => 'Email đã được sử dụng!',
            'phoneNumber.required'      => 'Số điện thoại không được bỏ trống!',
            'userPassword.required'     => 'Mật khẩu không được bỏ trống!',
            'userPassword.min'          => 'Mật khẩu ít nhất từ 6 ký tự!',
            'userPassword.max'          => 'Mật khẩu tối đã 20 ký tự!',
            'confirmPassword.required'  => 'Vui lòng nhập lại mật khẩu!',
            'confirmPassword.same'      => 'Mật khẩu không trùng nhau!',
        ]);

        DB::table('customer')->insertOrIgnore([
            'email'         => $request->email,
            'password'      => Hash::make($request->userPassword),
            'firstname'     => $request->firstName,
            'lastname'      => $request->lastName,
            'telephone'     => $request->phoneNumber,
            'newsletter'    => $request->newsletter,
            'address_id'    => 0,
            'status'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        dd('success');
    }

    public function cart() 
    {
        $headingTitle = 'Giỏ hàng | Mayhome - Món quà từ thiên nhiên';

        return view('catalog.pages.cart',
            compact('headingTitle')
        );
    }

    public function payment() 
    {
        $provinces = Province::orderBy('name', 'asc')->get();

        $cart = [
            'data' => Cart::content(),
            'count' => Cart::count(),
            'total' => Cart::total(),
        ];

        $headingTitle = 'Thanh toán đơn hàng | Mayhome - Món quà từ thiên nhiên';

        return view('catalog.pages.payment', compact(
            'headingTitle',
            'provinces',
            'cart'
        ));
    }

    public function promotionPayment() 
    {
        $provinces = Province::orderBy('name', 'asc')->get();

        $cart = [
            'data' => Cart::instance('promotion')->content(),
            'count' => Cart::instance('promotion')->count(),
            'total' => Cart::instance('promotion')->total(),
        ];

        $headingTitle = 'Thanh toán đơn hàng khuyến mãi | Mayhome - Món quà từ thiên nhiên';
        $isPromotion = true; // Flag to identify promotion payment

        return view('catalog.pages.payment', compact(
            'headingTitle',
            'provinces',
            'cart',
            'isPromotion'
        ));
    }

    public function postPayment(Request $request)
    {
        $firstname = trim($request->firstname);
        $lastname = trim($request->lastname);
        $phone = trim($request->phone);
        $province = Province::isExists($request->province);
        $district = District::isExists($request->district);
        $ward = Ward::isExists($request->ward);
        $address = trim($request->address);
        $note = trim($request->note);
        $voucherCode = trim($request->voucher_code);
        $isPromotion = $request->cart_type;
        $discount = 0;
        $cartCount = 0;
        $cart = null;

        if ($isPromotion) {
            $cartCount = Cart::instance('promotion')->count();
            $subTotal = Cart::instance('promotion')->total();
            $cart = Cart::instance('promotion')->content();
        }
        else {
            $cartCount = Cart::count();
            $subTotal = Cart::total();
            $cart = Cart::content();
        }

        $voucher = Voucher::where('code', $voucherCode)->where('is_active', VoucherStatus::ACTIVE)->first();
        if ($voucher) {
            $discount = (new VoucherLogic())->calculateDiscount($voucherCode, $subTotal);
            $total = $subTotal - $discount;
        }
        else {
            $total = $subTotal;
        }

        // Create invoice
        $invoice = Invoice::create([
            'invoice_code' => Config::get('app.prefix_invoice_code') . increaseCode(Invoice::latest()->value('id')),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'fullname' => $lastname . ' ' . $firstname,
            'mobile' => $phone,
            'province' => $province,
            'district' => $district,
            'ward' => $ward,
            'address' => $address,
            'note' => $note,
            'product_count' => $cartCount,
            'sub_total' => $subTotal,
            'discount' => $discount,
            'price_total' => $total,
            'page_id' => $isPromotion ? 1 : 0,
            'voucher_id' => ($voucher) ? $voucher->id : 0,
            'tax' => 0,
            'status' => InvoiceStatus::PENDING
        ]);

        // Create invoice items
        if (!empty($invoice->id)) {
            if (count($cart) > 0) {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                foreach ($cart as $item) {
                    InvoiceDetail::create([
                        'invoice_id' => $invoice->id,
                        'product_id' => $item->id,
                        'product_name' => $item->name,
                        'product_price' => $item->price,
                        'quantity' => $item->qty,
                        'subtotal' => $item->subtotal,
                        'discount' => 0,
                        'tax' => 0,
                        'options' => json_encode($item->options)
                    ]);
                }
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        }

        Cart::destroy();

        $mailData = [
            'invoice_code' => $invoice->id,
            'customer_name' => trim($lastname). ' '. trim($firstname),
            'phone_number' => $phone,
        ];

        Config::set('mail.from.name', 'Đơn hàng mới');

        Mail::send('mailer.invoice', $mailData, function($message) use ($invoice) {
            $message->to('cskh.pan@gmail.com');
            $message->subject('Bạn vừa nhận được 1 đơn hàng từ website '. request()->getHttpHost());
        });

        return response()->json([
            'status' => 200,
            'message' => __('Order payment successful'),
            'redirect' => route('catalog.homepage')
        ]);
    }

    public function postPromotionPayment(Request $request)
    {
        $firstname = trim($request->firstname);
        $lastname = trim($request->lastname);
        $phone = trim($request->phone);
        $province = Province::isExists($request->province);
        $district = District::isExists($request->district);
        $ward = Ward::isExists($request->ward);
        $address = trim($request->address);
        $note = trim($request->note);

        // Use promotion cart instance
        $promotionCart = Cart::instance('promotion');

        // Create invoice
        $invoice = Invoice::create([
            'invoice_code' => Config::get('app.prefix_invoice_code') . increaseCode(Invoice::latest()->value('id')),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'fullname' => $lastname . ' ' . $firstname,
            'mobile' => $phone,
            'province' => $province,
            'district' => $district,
            'ward' => $ward,
            'address' => $address,
            'note' => $note,
            'product_count' => $promotionCart->count(),
            'price_total' => $promotionCart->total(),
            'tax' => 0,
            'status' => 'pending'
        ]);

        // Create invoice items
        if (!empty($invoice->id)) {
            $cart = $promotionCart->content();

            if (count($cart) > 0) {
                foreach ($cart as $item) {
                    InvoiceDetail::create([
                        'invoice_id' => $invoice->id,
                        'product_id' => is_numeric($item->id) ? $item->id : 0, // Promotion products may not have numeric IDs
                        'product_name' => $item->name,
                        'product_price' => $item->price,
                        'quantity' => $item->qty,
                        'subtotal' => $item->subtotal,
                        'discount' => 0,
                        'tax' => 0,
                        'options' => json_encode($item->options)
                    ]);
                }
            }
        }

        // Destroy promotion cart after payment
        $promotionCart->destroy();

        return response()->json([
            'status' => 200,
            'message' => 'Thanh toán đơn hàng thành công',
            'redirect' => route('catalog.promotion')
        ]);
    }

    public function postAddQuote(Request $request) 
    {
        $validated = $request->validate([
            'name'          => 'required|max:255',
            'phone'         => 'required|max:15',
        ],[
            'name.required'=> 'Vui lòng nhập họ tên của bạn!',
            'name.max'=> 'Tên không được vượt quá 255 ký tự!',
            'phone.required'=> 'Vui lòng nhập số điện thoại của bạn!',
            'phone.max' => 'Số điện thoại không được vượt quá 15 số',
        ]);

        DB::table('quote')->insert([
            'product'       => $request->productName,
            'customer_name' => $request->name,
            'phone_number'  => $request->phone,
            'email'         => $request->email,
            'message'       => $request->message,
            'status'        => 0,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);
    }

    public function postSearch(Request $request) 
    {
        return redirect()->route('catalog.getSearch', ['key' => $request->key]);
    }

    public function getSearch() 
    {
        if(!isset($_GET['key'])) {
            return redirect()->route('catalog.homepage');
        } else {
            $key = $_GET['key'];

            $products = ProductDescription::where('name', 'like', '%'. $_GET["key"] . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);

            $categories = ProductCategory::get();

            $keywords = '';
            foreach($categories as $category) {
                $keywords .= Str::slug($category->name, ' ') . ', ';
            }

            // SEO Meta
            $controller = new Controller();
            $controller->seo_tools(
                'Tìm kiếm sản phẩm với từ khóa: ' . $key,
                'Mayhome – Món quà từ thiên nhiên. P.A.N vì một sứ mệnh: Mang sản phẩm CAO SU THIÊN NHIÊN CHẤT LƯỢNG đến gần hơn, hợp túi tiền hơn với tất cả người tiêu dung Việt Nam. Nên Mayhome Chính thức có mặt tại: Co.opmart, Aeon, Emart và dự kiến sẽ mở rộng hơn tại các hệ thống lớn – uy tín vì sứ mệnh trên. Cùng P.A.N – Mayhome tham gia mua sắm “thay gối cả nhà – nhận quà siêu xinh!”; với nhiều sự kiện, chương trình khuyến mãi – siêu khuyến mãi, thông tin hấp dẫn tại các hệ thống: Co.opmart, Aeon, Emart và fanpage của Mayhome cả nhà nhé!',
                $keywords . 'mayhome, mayhomevn, mayhome viet nam mayhomevn.com',
                asset('public/catalog/assets/img/lazyload.jpg'),
                URL::current()
            );

            $pageTitle = 'Tìm kiếm sản phẩm với từ khóa: <strong>' .$key. '</strong>';

            return view('catalog.pages.search',
                compact('pageTitle', 'products', 'key')
            );
        }
    }

    public function nemcstn() 
    {
        $pageTitle = 'Nệm cao su thiên nhiên | P.A.N  TRAO CHẤT LƯỢNG – NHẬN NIỀM TIN';

        $this->seo_tools(
            $pageTitle,
            'MayHome chính thức đạt thêm bước tiến về việc nâng cao tiêu chuẩn Chất lượng và An toàn cho sản phẩm Gối / Nệm / Bộ trải,… CAO SU THIÊN NHIÊN',
            'nem, nệm, nệm cao su, nệm cao su thiên nhiên, nem cao su thien nhien, nem cstn, nem gia re, nem cao su gia re, nệm cao su giá rẻ',
            asset('public/catalog/nemcstn/assets/img/share-thumbnail.png'),
            URL::current()
        );
        
        return view('catalog.pages.nemcstn',
            compact('pageTitle')
        );
    }

    public function procedure()
    {   
        $nemcstn = NemCSTN::where('status', 1)->orderBy('id', 'asc')->get();

        $pageTitle = 'MH x Nệm cao su thiên nhiên 7 Zones Massage chính hãng -  Tinh hoa từng điểm chạm';

        $this->seo_tools(
            $pageTitle,
            'Chính thức đạt Chứng nhận Oeko-tex Standard 100 toàn cầu nâng cao tiêu chuẩn Chất lượng và An toàn cho sản phẩm',
            'nem, nệm, nệm cao su, nệm cao su thiên nhiên, nem cao su thien nhien, nem cstn, nem gia re, nem cao su gia re, nệm cao su giá rẻ',
            asset('public/catalog/procedure/assets/img/share-thumbnail.jpg'),
            URL::current()
        );

        return view('catalog.pages.procedure', compact('nemcstn'));
    }

    public function postAddGuarantee(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'phoneNumber'   => 'required',
            'productName'   => 'required',
            'email'         => 'required',
            'systemName'    => 'required',
            'image'         => 'required|mimes:jpeg,png,jpg,gif,webp',
            'note'          => 'required',
        ],[
            'name.required'         => 'Vui lòng nhập họ tên!',
            'phoneNumber.required'  => 'Vui lòng nhập số điện thoại!',
            'productName.required'  => 'Vui lòng chọn sản phẩm bảo hành!',
            'email.required'        => 'Vui lòng nhập email của bạn!',
            'systemName.required'   => 'Vui lòng tên hệ thống mua hàng!',
            'image.required'        => 'Chọn ảnh sản phẩm!',
            'image.mimes'           => 'Định dạng file không hợp lệ (jpeg,png,jpg,gif,webp)!',
            'note.required'         => 'Vui lòng nhập lý do muốn bảo hành!',
        ]);

        if (!$validator->fails()) {
            // save image to storage
            if($request->hasFile('image')) {
                $image = Storage::disk('public')->putFile('uploads/guarantee', $request->file('image'));
            }

            // add guarantee db
            $lasted = DB::table('guarantees')->insertGetId([
                'name'          => trim($request->name),
                'phone_number'  => trim($request->phoneNumber),
                'email'         => trim($request->email),
                'system_name'   => trim($request->systemName),
                'product_name'  => trim($request->productName),
                'image'         => $image,
                'note'          => trim($request->note),
                'status'        => false,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]);
        
            if($lasted) {
                $guarantee = DB::table('guarantees')->where('id', $lasted)->first();
                $mailData = [
                    'name'          => $guarantee->name,
                    'phoneNumber'   => $guarantee->phone_number,
                    'email'         => $guarantee->email,
                    'systemName'    => $guarantee->system_name,
                    'productName'   => $guarantee->product_name,
                    'image'         => !empty($guarantee->image) ? $guarantee->image : '',
                    'note'          => $guarantee->note
                ];

                Mail::send('catalog.mail.guarantee', $mailData, function($message) use ($guarantee) {
                    $message->to('cskh.pan@gmail.com');
                    $message->subject('Bạn vừa nhận được 1 yêu cầu bảo hành từ website '. request()->getHttpHost());
                });

                return response()->json([
                    'status'    => 200,
                    'message'   => 'Gửi thông tin bảo hành thành công',
                    'route'     => route('catalog.homepage'),
                ]);
            } else {
                return response()->json([
                    'status'    => 'E0',
                    'message'   => 'Lỗi trong quá trình xử lý!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 'E0',
                'message'   => 'error',
                'errors'    => $validator->errors()->toArray(),
            ]);
        }

    }
}
