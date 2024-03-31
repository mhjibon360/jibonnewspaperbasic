<footer class="footer-area">
    <div class="container">

        <div class="footer-menu">
            <div class="menu-footer-menu-container">
                <ul id="menu-footer-menu" class="menu">
                    @php
                        $allsubcategory = App\Models\Subcategory::orderBy('subcategory_name_en', 'asc')->take(9)->get();
                    @endphp
                    @foreach ($allsubcategory as $subcat)
                        <li id="menu-item-550"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-550">
                            @if (session()->get('language') == 'english')
                                <a href=" {{ route('subcategory.news.page',['id'=>$subcat->id,'slug'=>$subcat->subcategory_name_en]) }}">{{ $subcat->subcategory_name_en }}</a>
                            @else
                                <a href=" {{ route('subcategory.news.page',['id'=>$subcat->id,'slug'=>$subcat->subcategory_name_bn]) }}">{{ $subcat->subcategory_name_bn }}</a>
                            @endif
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>

        <div class="footerColor">

            <div class="copy_right_section">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-right">
                            © All rights reserved © EasyNews </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="design-developed">
                            Theme Developed BY <a href=" " target="_blank">easylearningbd.Com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href=" " class="scrollToTop" style=""><i class="las la-long-arrow-alt-up"></i></a>
    </div>
</footer>
