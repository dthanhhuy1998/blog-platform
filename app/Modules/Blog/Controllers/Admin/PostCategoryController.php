<?php 

namespace App\Modules\Blog\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Str;

use App\Helpers\SEOHelper;
use App\Modules\Blog\Services\PostCategoryService;

class PostCategoryController extends Controller
{
    public function __construct(private PostCategoryService $postCategoryService) {}

    public function index()
    {
        $categories = $this->postCategoryService->getAllCategory();

        SEOHelper::setSEO(__('Category List') . ' | ' . page_name());
        $pageTitle = __('Category List');

        return view('admin.category.index', compact(
            'pageTitle',
            'categories'
        ));
    }

    public function create()
    {
        $categories = $this->postCategoryService->getAllCategory();

        SEOHelper::setSEO(__('Create Category') . ' | ' . page_name());
        $pageTitle = __('Create Category');

        return view('admin.category.create', compact(
            'pageTitle',
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoryName'  => 'required|max:100|unique:article_category,name',
            'metaTitle'     => 'required|max:100'
        ],[
            'categoryName.required'     => 'Tên danh mục không được bỏ trống!',
            'categoryName.max'          => 'Tên danh mục tối đa 100 ký tự',
            'categoryName.unique'       => 'Tên danh mục đã được sử dụng!',
            'metaTitle.required'        => 'Meta Title không được bỏ trống!',
            'metaTitle.max'             => 'Meta Title tối đa 100 ký tự',
        ]);

        $file_path = '';
        if($request->hasFile('file')) {
            $file_path = Storage::disk('public')->putFile('categories/thumbnails', $request->file('file'));
        }

        $data = [
            'image'             => $file_path,
            'name'              => $request->categoryName,
            'slug'              => Str::slug($request->categoryName, '-'),
            'description'       => $request->description,
            'meta_title'        => $request->metaTitle,
            'meta_description'  => $request->metaDescription,   
            'meta_keyword'      => $request->metaTagKeywords,
            'parent_id'         => $request->parentId,
            'sort_order'        => $request->sortOrder,
            'status'            => $request->status,
        ];

        $this->postCategoryService->create($data);

        return redirect()->route('admin.categories.index')->with('success_msg', __('Create category successfully'));
    }

    public function edit($id)
    {
        $category = $this->postCategoryService->find($id);
        $categories = $this->postCategoryService->getAllCategory();

        $title = __('Edit Category') .': '. $category->name;
        SEOHelper::setSEO($title . ' | ' . page_name());
        $pageTitle = $title;

        return view('admin.category.edit', compact(
            'pageTitle',
            'categories',
            'category'
        ));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'categoryName'  => 'required|max:100|unique:article_category,name,' . $id,
            'metaTitle'     => 'required|max:100'
        ],[
            'categoryName.required'     => 'Tên danh mục không được bỏ trống!',
            'categoryName.max'          => 'Tên danh mục tối đa 100 ký tự',
            'categoryName.unique'       => 'Tên danh mục đã được sử dụng!',
            'metaTitle.required'        => 'Meta Title không được bỏ trống!',
            'metaTitle.max'             => 'Meta Title tối đa 100 ký tự',
        ]);

        $file_path = '';
        if($request->hasFile('file')) {
            $file_path = Storage::disk('public')->putFile('categories/thumbnails', $request->file('file'));
        }

        $data = [
            'image'             => $file_path,
            'name'              => $request->categoryName,
            'slug'              => Str::slug($request->categoryName, '-'),
            'description'       => $request->description,
            'meta_title'        => $request->metaTitle,
            'meta_description'  => $request->metaDescription,   
            'meta_keyword'      => $request->metaTagKeywords,
            'parent_id'         => $request->parentId,
            'sort_order'        => $request->sortOrder,
            'status'            => $request->status,
        ];

        $this->postCategoryService->update($id, $data);

        return redirect()->route('admin.categories.index')->with('success_msg', __('Update category successfully'));
    }

    public function destroy($id)
    {
        $category = $this->postCategoryService->find($id);

        if($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $this->postCategoryService->delete($id);

        return redirect()->route('admin.categories.index')->with('success', __('Delete category successfully'));
    }
}