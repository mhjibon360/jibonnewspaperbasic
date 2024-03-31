@php
    $categories = App\Models\Category::orderBy('category_name_en', 'asc')->latest()->get();
@endphp
<div class="menu_section sticky" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mobileLogo">
                    <a href=" " title="NewsFlash">
                        <img src="{{ asset('frontend') }}/assets/images/footer_logo.gif" alt="Logo" title="Logo">
                    </a>
                </div>
                <div class="stellarnav dark desktop"><a href="https://newssitedesign.com/newsflash/#"
                        class="menu-toggle full"><span class="bars"><span></span><span></span><span></span></span>
                    </a>
                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-89"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-89">
                            <a href="{{ route('home.index') }}" aria-current="page"> <i
                                    class="fa-solid fa-house-user"></i> 
                                    @if (session()->has('language')=='english')
                                    Home
                                    @else
                                    হোম
                                    @endif
                                    
                                  </a>
                        </li>


                        @foreach ($categories as $category)
                            <li id="menu-item-291"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-291 has-sub">
                                <a href="{{ route('category.news.page',['id'=>$category->id,'slug'=>$category->category_slug_en]) }}">
                                    @if (session()->get('language') == 'english')
                                        {{ $category->category_name_en }}
                                    @else
                                        {{ $category->category_name_bn }}
                                    @endif



                                    {{-- @if ($subcategories->category_id)
                                        <i class="fa-solid fa-caret-down fa-fw"></i>
                                    @endif --}}

                                </a>

                                <ul class="sub-menu">
                                    @php
                                        $subcategories = App\Models\Subcategory::orderBy('subcategory_name_en', 'asc')
                                            ->where('category_id', $category->id)
                                            ->get();
                                    @endphp

                                    @foreach ($subcategories as $subcategory)
                                        <li id="menu-item-294"
                                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-294">
                                            <a href="{{ route('subcategory.news.page',['id'=>$subcategory->id,'slug'=>$subcategory->subcategory_slug_en]) }}">
                                                @if (session()->get('language') == 'english')
                                                    {{ $subcategory->subcategory_name_en }}
                                                @else
                                                    {{ $subcategory->subcategory_name_bn }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach




                                </ul>
                                <a class="dd-toggle" href=" "><span class="icon-plus"></span></a>
                            </li>
                        @endforeach


                        {{-- <li id="menu-item-291"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-291 has-sub">
                            <a href=" ">Sports</a>
                            <ul class="sub-menu">
                                <li id="menu-item-294"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-294">
                                    <a href=" ">Sub
                                        Sports</a>
                                </li>
                                <li id="menu-item-292"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-292">
                                    <a href=" ">Sub
                                        Sports</a>
                                </li>
                                <li id="menu-item-293"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-293">
                                    <a href=" ">Sub
                                        Sports</a>
                                </li>
                                <li id="menu-item-295"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-295">
                                    <a href=" ">Sub
                                        Sports</a>
                                </li>

                            </ul>
                            <a class="dd-toggle" href=" "><span class="icon-plus"></span></a>
                        </li> --}}




                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
