<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Dotenv\Parser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryUpdateRequest;


class CategoryController extends BaseAdminController
{
    private  $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$paginator = BlogCategory::paginate(5);

        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);
        return view('blog.admin.category.index',compact('paginator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $item = new BlogCategory();
        //$categoryList = BlogCategory::all();

        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.category.edit',
        compact('item','categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug']))
        {
            $data['slug'] = \Str::slug($data['title']);

        }

       $item = (new BlogCategory())->create($data);

        if($item) {
            return redirect()->route('blog.admin.categories.edit',[$item->id])
                ->with(['success' => 'Успешно сохранено']);
        }else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
        //$item = BlogCategory::findOrFail($id);
        //$categoryList = BlogCategory::all();
        $item = $categoryRepository->getEdit($id);
        if(empty($item))
        {
            abort(404);
        }
        $categoryList = $categoryRepository->getForComboBox();
        return view('blog.admin.category.edit',
            compact('item','categoryList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {

        //$validatedData = $this->validate($request,$rules);
        //$validatedData = $request->validate($rules);

        //$validator = \Validator::make($request->all(),$rules);
        //$validatedData[] = $validator->passes();
        //$validatedData[] = $validator->validate();
        //$validatedData[] = $validator->failed();
        //$validatedData[] = $validator->errors();
        //$validatedData[] = $validator->fails();



        $item = $this->blogCategoryRepository=>getEdit($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg' => "Запись id=[ {$id} ] не найдена"])
                ->withInput();
        }
        $data = $request->all();

        $result = $item->update($data);
        if($result) {
            return redirect()
                ->route('blog.admin.categories.edit',$item->id)
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
