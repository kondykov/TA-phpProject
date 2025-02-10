@extends('dashboard.dashboardLayout')

@section('body')
    @parent
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Product Details</h5>
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 text-center">
                                <img class="w-100 border-radius-lg shadow-lg mx-auto" src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" alt="chair">
                                <div class="my-gallery d-flex mt-4 pt-2" itemscope="" itemtype="http://schema.org/ImageGallery" data-pswp-uid="1">
                                    <figure itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                                        <a href="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" itemprop="contentUrl" data-size="500x600">
                                            <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow" src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" alt="Image description">
                                        </a>
                                    </figure>
                                    <figure class="ms-3" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                                        <a href="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" itemprop="contentUrl" data-size="500x600">
                                            <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow" src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" itemprop="thumbnail" alt="Image description">
                                        </a>
                                    </figure>
                                    <figure class="ms-3" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                                        <a href="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" itemprop="contentUrl" data-size="500x600">
                                            <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow" src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" itemprop="thumbnail" alt="Image description">
                                        </a>
                                    </figure>
                                    <figure class="ms-3" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                                        <a href="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" itemprop="contentUrl" data-size="500x600">
                                            <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow" src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-1080x675.jpg" itemprop="thumbnail" alt="Image description">
                                        </a>
                                    </figure>
                                </div>
                                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                    <!-- Background of PhotoSwipe.
                It's a separate element, as animating opacity is faster than rgba(). -->
                                    <div class="pswp__bg"></div>
                                    <!-- Slides wrapper with overflow:hidden. -->
                                    <div class="pswp__scroll-wrap">
                                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                        <div class="pswp__container">
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                        </div>
                                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                        <div class="pswp__ui pswp__ui--hidden">
                                            <div class="pswp__top-bar">
                                                <!--  Controls are self-explanatory. Order can be changed. -->
                                                <div class="pswp__counter"></div>
                                                <button class="btn btn-white btn-sm pswp__button pswp__button--close">Close (Esc)</button>
                                                <button class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                                                <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev
                                                </button>
                                                <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                                                </button>
                                                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                                <div class="pswp__preloader">
                                                    <div class="pswp__preloader__icn">
                                                        <div class="pswp__preloader__cut">
                                                            <div class="pswp__preloader__donut"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                <div class="pswp__share-tooltip"></div>
                                            </div>
                                            <div class="pswp__caption">
                                                <div class="pswp__caption__center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mx-auto">
                                <h3 class="mt-lg-0 mt-4">Minimal Bar Stool</h3>
                                <div class="rating">
                                    <i class="material-symbols-rounded text-lg">grade</i>
                                    <i class="material-symbols-rounded text-lg">grade</i>
                                    <i class="material-symbols-rounded text-lg">grade</i>
                                    <i class="material-symbols-rounded text-lg">grade</i>
                                    <i class="material-symbols-rounded text-lg">star_outline</i>
                                </div>
                                <br>
                                <h6 class="mb-0 mt-3">Price</h6>
                                <h5>$1,419</h5>
                                <span class="badge badge-success">In Stock</span>
                                <br>
                                <label class="mt-4">Description</label>
                                <ul>
                                    <li>The most beautiful curves of this swivel stool adds an elegant touch to any environment</li>
                                    <li>Memory swivel seat returns to original seat position</li>
                                    <li>Comfortable integrated layered chair seat cushion design</li>
                                    <li>Fully assembled! No assembly required</li>
                                </ul>
                                <div class="row mt-4">
                                    <div class="col-lg-5 mt-lg-0 mt-2">
                                        <label class="ms-0">Frame Material</label>
                                        <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-material" id="choices-material" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">Wood</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">Wood</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-material-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 3" data-select-text="" data-choice-selectable="" aria-selected="true">Aluminium</div><div id="choices--choices-material-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 4" data-select-text="" data-choice-selectable="">Carbon</div><div id="choices--choices-material-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 2" data-select-text="" data-choice-selectable="">Steel</div><div id="choices--choices-material-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 1" data-select-text="" data-choice-selectable="">Wood</div></div></div></div>
                                    </div>
                                    <div class="col-lg-5 mt-lg-0 mt-2">
                                        <label class="ms-0">Color</label>
                                        <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-colors" id="choices-colors" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">White</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">White</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-colors-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 3" data-select-text="" data-choice-selectable="" aria-selected="true">Black</div><div id="choices--choices-colors-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 4" data-select-text="" data-choice-selectable="">Blue</div><div id="choices--choices-colors-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 2" data-select-text="" data-choice-selectable="">Gray</div><div id="choices--choices-colors-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 6" data-select-text="" data-choice-selectable="">Pink</div><div id="choices--choices-colors-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Choice 5" data-select-text="" data-choice-selectable="">Red</div><div id="choices--choices-colors-item-choice-6" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Choice 1" data-select-text="" data-choice-selectable="">White</div></div></div></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="ms-0">Quantity</label>
                                        <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-quantity" id="choices-quantity" hidden="" tabindex="-1" data-choice="active"><option value="Choice 1">1</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="null" aria-selected="true">1</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--choices-quantity-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Choice 1" data-select-text="" data-choice-selectable="" aria-selected="true">1</div><div id="choices--choices-quantity-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Choice 2" data-select-text="" data-choice-selectable="">2</div><div id="choices--choices-quantity-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Choice 3" data-select-text="" data-choice-selectable="">3</div><div id="choices--choices-quantity-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Choice 4" data-select-text="" data-choice-selectable="">4</div><div id="choices--choices-quantity-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Choice 5" data-select-text="" data-choice-selectable="">5</div><div id="choices--choices-quantity-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Choice 6" data-select-text="" data-choice-selectable="">6</div><div id="choices--choices-quantity-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="Choice 7" data-select-text="" data-choice-selectable="">7</div><div id="choices--choices-quantity-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="Choice 8" data-select-text="" data-choice-selectable="">8</div><div id="choices--choices-quantity-item-choice-9" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="9" data-value="Choice 9" data-select-text="" data-choice-selectable="">9</div><div id="choices--choices-quantity-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="Choice 10" data-select-text="" data-choice-selectable="">10</div></div></div></div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-5">
                                        <button class="btn bg-gradient-dark mb-0 mt-lg-auto w-100" type="button" name="button">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <h5 class="ms-3">Other Products</h5>
                                <div class="table table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Review</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Availability</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/black-chair.jpg" class="avatar avatar-md me-3" alt="table image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Christopher Knight Home</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">$89.53</p>
                                            </td>
                                            <td>
                                                <div class="rating ms-lg-n4">
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">star_outline</i>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="progress mx-auto">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm">230019</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-pink.jpg" class="avatar avatar-md me-3" alt="table image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Bar Height Swivel Barstool</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">$99.99</p>
                                            </td>
                                            <td>
                                                <div class="rating ms-lg-n4">
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="progress mx-auto">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm">87120</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-steel.jpg" class="avatar avatar-md me-3" alt="table image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Signature Design by Ashley</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">$129.00</p>
                                            </td>
                                            <td>
                                                <div class="rating ms-lg-n4">
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">star_outline</i>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="progress mx-auto">
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm">412301</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-wood.jpg" class="avatar avatar-md me-3" alt="table image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Modern Square</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">$59.99</p>
                                            </td>
                                            <td>
                                                <div class="rating ms-lg-n4">
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                    <i class="material-symbols-rounded text-lg">grade</i>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="progress mx-auto">
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm">001992</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
