<aside class="sidebar">
    <div class="sidebar__menu-group">
        <ul class="sidebar_nav">
            <!-- dashboard Start-->
            {{-- <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <span data-feather="home" class="nav-icon"></span>
                    <span class="menu-text">{{ trans('label.dashboard') }}</span>
                </a>
            </li> --}}
            <!-- dashboard End-->

            <!-- Home Page Start-->
            <li class="has-child {{ Request::segment(2) == 'homeSlider' || Request::segment(2) == 'companyBackgroundProducts' || Request::segment(2) == 'client_review' || Request::segment(2) == 'proud_member' || Request::segment(2) == 'frenchise_opportunities' || Request::segment(2) == 'trustedManufacturers' ? 'open' : '' }}">
                <a href="#" class="{{ Request::segment(2) == 'homeSlider' || Request::segment(2) == 'companyBackgroundProducts' || Request::segment(2) == 'client_review' || Request::segment(2) == 'proud_member' || Request::segment(2) == 'frenchise_opportunities' || Request::segment(2) == 'trustedManufacturers' ? 'active' : '' }}">
                    <span data-feather="home" class="nav-icon"></span>
                    <span class="menu-text">{{ trans('label.manage_home_page') }}</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.homeSlider.list') }}"
                            class="{{ Request::segment(2) == 'homeSlider' ? 'active' : '' }}">
                            {{ trans('label.manage_homeSlider') }}
                        </a>
                    </li>
                    {{-- <li class="l_sidebar">
                        <a href="{{ route('admin.director.list') }}"
                            class="{{ Request::segment(2) == 'director' ? 'active' : '' }}">
                            {{ trans('label.manage_director') }}
                        </a>
                    </li> --}}
                    <li class="l_sidebar">
                        <a href="{{ route('admin.company_background_prodcuts.edit') }}"
                            class="{{ Request::segment(2) == 'companyBackgroundProducts' ? 'active' : '' }}">
                            {{ trans('label.manage_company_background_products') }}
                        </a>
                    </li>

                    <li class="l_sidebar">
                        <a href="{{ route('admin.client_review.list') }}"
                            class="{{ Request::segment(2) == 'client_review' ? 'active' : '' }}">
                            {{ trans('label.manage_client_reviews') }}
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.proud_member.list') }}"
                            class="{{ Request::segment(2) == 'proud_member' ? 'active' : '' }}">
                            {{ trans('label.manage_proud_member') }}
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.frenchise_opportunities.edit') }}"
                            class="{{ Request::segment(2) == 'frenchise_opportunities' ? 'active' : '' }}">
                            {{ trans('label.manage_frenchise_opportunities') }}
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.trustedManufacturers.list') }}"
                            class="{{ Request::segment(2) == 'trustedManufacturers' ? 'active' : '' }}">
                            {{ trans('label.manage_trustedManufacturers') }}
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Home Page End-->

            {{-- <li
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.manufacturingplant_tour_off.edit') }}"
                            class="{{ Request::segment(2) == 'manufacturingplant_tour_off' ? 'active' : '' }}">
                            {{ trans('label.manage_manufacturingplant_tour_banner_address') }}
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.manufacturingplant_tour.list') }}"
                            class="{{ Request::segment(2) == 'manufacturingplant_tour' ? 'active' : '' }}">
                            {{ trans('label.manage_manufacturingplant_tour_images') }}
                        </a>
                    </li>
                </ul>
            </li> --}}

            <!-- CMS Page Start-->
            <li class="has-child {{ Request::segment(2) == 'companyprofile' || Request::segment(2) == 'manage-manufacturing-plant' || Request::segment(2) == 'manage-awards-certificate' || Request::segment(2) == 'manage-director' || Request::segment(2) == 'career' || Request::segment(2) == 'we_believe_points' || Request::segment(2) == 'trusted_partner' || Request::segment(2) == 'division_and_sister_concern' || Request::segment(2) == 'pchpl_teams'  || Request::segment(2) == 'manage-awards-certificate-banner' || Request::segment(2) == 'manage-awards-certificate-awards' || Request::segment(2) == 'manmanage-awards-certificate' || Request::segment(2) == 'manufacturing-plant' || Request::segment(2) == 'joinUs' || Request::segment(2) == 'opportunites' || Request::segment(2) == 'contractmanufacturer' || Request::segment(2) == 'career-form' || Request::segment(2) == 'director' || Request::segment(2) == 'achievements' || Request::segment(2) == 'achievementTitleDescription' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'companyprofile' || Request::segment(2) == 'manage-manufacturing-plant' || Request::segment(2) == 'manage-awards-certificate' || Request::segment(2) == 'manage-director' || Request::segment(2) == 'career' || Request::segment(2) == 'we_believe_points' || Request::segment(2) == 'trusted_partner' || Request::segment(2) == 'division_and_sister_concern' || Request::segment(2) == 'pchpl_teams'  || Request::segment(2) == 'manage-awards-certificate-banner' || Request::segment(2) == 'manage-awards-certificate-awards' || Request::segment(2) == 'manmanage-awards-certificate' || Request::segment(2) == 'manufacturing-plant' || Request::segment(2) == 'joinUs' || Request::segment(2) == 'opportunites' || Request::segment(2) == 'contractmanufacturer' || Request::segment(2) == 'career-form' || Request::segment(2) == 'director' || Request::segment(2) == 'achievements' || Request::segment(2) == 'achievementTitleDescription' ? 'active' : '' }}">
                    <span data-feather="archive" class="nav-icon"></span>
                    <span class="menu-text">{{ trans('label.manage_cms') }}</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="has-child {{ Request::segment(2) == 'companyprofile' || Request::segment(2) == 'we_believe_points' || Request::segment(2) == 'trusted_partner' || Request::segment(2) == 'division_and_sister_concern' || Request::segment(2) == 'pchpl_teams'  || Request::segment(2) == 'contractmanufacturer'  ? 'open' : '' }}">
                        <a href="#" class="{{ Request::segment(2) == 'companyprofile' || Request::segment(2) == 'we_believe_points' || Request::segment(2) == 'trusted_partner' || Request::segment(2) == 'division_and_sister_concern' || Request::segment(2) == 'pchpl_teams'  || Request::segment(2) == 'contractmanufacturer'  ? 'active' : '' }}">
                            <span class="menu-text">{{ trans('label.manage_companyprofile') }}</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.companyprofile.edit') }}"
                                    class="{{ Request::segment(2) == 'companyprofile' ? 'active' : '' }}">
                                    {{ trans('label.manage_companyprofile') }}</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.we_believe_points.list') }}"
                                    class="{{ Request::segment(2) == 'we_believe_points' ? 'active' : '' }}">
                                    {{ trans('label.we_believe_points') }}</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.trusted_partner.list') }}"
                                    class="{{ Request::segment(2) == 'trusted_partner' ? 'active' : '' }}">
                                    {{ trans('label.trusted_partner') }}</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.division_and_sister_concern.list') }}"
                                    class="{{ Request::segment(2) == 'division_and_sister_concern' ? 'active' : '' }}">
                                    {{ trans('label.division_and_sister_concern') }}</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.pchpl_teams.list') }}"
                                    class="{{ Request::segment(2) == 'pchpl_teams' ? 'active' : '' }}">
                                    {{ trans('label.pchpl_teams') }}</a>
                            </li>
                            {{-- <li class="l_sidebar">
                                <a href="{{ route('admin.achievements.list') }}"
                                    class="{{ Request::segment(2) == 'achievements' ? 'active' : '' }}">
                                    Achievements</a>
                            </li> --}}
                            <li class="l_sidebar">
                                <a href="{{ route('admin.contractmanufacturer.list') }}"
                                    class="{{ Request::segment(2) == 'contractmanufacturer' ? 'active' : '' }}">
                                    Contract Manufacturer</a>
                            </li>
                            {{-- <li class="l_sidebar">
                                <a href="{{ route('admin.achievement_title_description.edit') }}"
                                    class="{{ Request::segment(2) == 'achievementTitleDescription' ? 'active' : '' }}">
                                    Achievement Title And Description</a>
                            </li> --}}
                        </ul>
                    </li>
                    <!-- Manage Manufacturing Plant Module -->
                    {{-- <li class="has-child {{ Request::segment(2) == 'manage-manufacturing-plant' || Request::segment(2) == 'manufacturing-plant' ? 'open' : '' }}">
                        <a href="#"
                            class="{{ Request::segment(2) == 'manage-manufacturing-plant' || Request::segment(2) == 'manufacturing-plant' ? 'active' : '' }}">
                            <span data-feather="box" class="nav-icon"></span>
                            <span class="menu-text">{{ trans('label.manage_manufacturing') }}</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.manageManufacturing.edit') }}"
                                    class="{{ Request::segment(2) == 'manage-manufacturing-plant' ? 'active' : '' }}">
                                    {{ trans('label.manage_manufacturing_plant') }}</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.manufacturingplant.list') }}"
                                    class="{{ Request::segment(2) == 'manufacturing-plant' ? 'active' : '' }}">
                                    {{ trans('label.manage_manufacturing_list') }}</a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- Awards & Certificate Module -->
                    <li class="has-child {{ Request::segment(2) == 'manage-awards-certificate' || Request::segment(2) == 'manage-awards-certificate-banner' || Request::segment(2) == 'manage-awards-certificate-awards' || Request::segment(2) == 'manmanage-awards-certificate' ? 'open' : '' }}">
                        <a href="#" class="{{ Request::segment(2) == 'manage-awards-certificate' || Request::segment(2) == 'manage-awards-certificate-banner' || Request::segment(2) == 'manage-awards-certificate-awards' || Request::segment(2) == 'manmanage-awards-certificate' ? 'active' : '' }}">
                            <span class="menu-text">Awards & Certificate</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.manageAwards.edit') }}"
                                    class="{{ Request::segment(2) == 'manage-awards-certificate-banner' ? 'active' : '' }}">
                                    Banner</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.manageAwards.awardsList') }}"
                                    class="{{ Request::segment(2) == 'manage-awards-certificate-awards' ? 'active' : '' }}">
                                    Awards</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.manageCertificate.certificateList') }}"
                                    class="{{ Request::segment(2) == 'manage-awards-certificate' ? 'active' : '' }}">
                                    Certificate</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Director Management -->

                    <li class="has-child {{ Request::segment(2) == 'manage-director' || Request::segment(2) == 'director' || Request::segment(2) == 'achievements' || Request::segment(2) == 'achievementTitleDescription' ? 'open' : '' }}">
                        <a href="#" class="{{ Request::segment(2) == 'manage-director' || Request::segment(2) == 'director' || Request::segment(2) == 'achievements' || Request::segment(2) == 'achievementTitleDescription' ? 'active' : '' }}">
                            <span class="menu-text">Director Management</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.director.list') }}"
                                    class="{{ Request::segment(2) == 'director' ? 'active' : '' }}">
                                    {{ trans('label.manage_director') }}
                                </a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.achievements.list') }}"
                                    class="{{ Request::segment(2) == 'achievements' ? 'active' : '' }}">
                                    Achievements</a>
                            </li>
                            <li class="l_sidebar">
                                <a href="{{ route('admin.achievement_title_description.edit') }}"
                                    class="{{ Request::segment(2) == 'achievementTitleDescription' ? 'active' : '' }}">
                                    Achievement Title And Description</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Director Management End-->

                    <!-- Career Module -->
                    <li class="has-child {{ Request::segment(2) == 'career' || Request::segment(2) == 'joinUs' || Request::segment(2) == 'opportunites' || Request::segment(2) == 'career-form' ? 'open'  : '' }}">
						<a href="#" class="{{ Request::segment(2) == 'career'  ? 'active' : '' }}">
							<span class="menu-text">Career</span>
							<span class="toggle-icon"></span>
						</a>
						<ul>
							<li class="l_sidebar">
								<a href="{{ route('admin.career.edit') }}" class="{{ Request::segment(2) == 'career' ? 'active' : '' }}">
									Career</a>
							</li>
                            <li class="l_sidebar">
								<a href="{{ route('admin.careerform.list') }}" class="{{ Request::segment(2) == 'career-form' ? 'active' : '' }}">
									Career Current Opportunities Form</a>
							</li>
                            <li class="l_sidebar">
								<a href="{{ route('admin.career.joinUs') }}" class="{{ Request::segment(2) == 'joinUs' ? 'active' : '' }}">
									Join Us</a>
							</li>
                            <li class="l_sidebar">
								<a href="{{ route('admin.opportunites.currentOpportunites') }}" class="{{ Request::segment(2) == 'opportunites' ? 'active' : '' }}">
                                Opportunites</a>
							</li>
						</ul>
					</li>

                </ul>
            </li>
            <!-- CMS Page End-->

            <!-- Corporate Office tour Page Start-->
            <li class="has-child {{ Request::segment(2) == 'corporateofficetour' || Request::segment(2) == 'corporateofficetourimage' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'corporateofficetour' || Request::segment(2) == 'corporateofficetourimage' ? 'active' : '' }}">
                    <span data-feather="briefcase" class="nav-icon"></span>
                    <span class="menu-text">Corporate Office Tour</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.corporateofficetour.edit') }}"
                            class="{{ Request::segment(2) == 'corporateofficetour' ? 'active' : '' }}">
                            Corporate Office Tour</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.corporateofficetourimage.list') }}"
                            class="{{ Request::segment(2) == 'corporateofficetourimage' ? 'active' : '' }}">
                            Corporate Office Tour Image</a>
                    </li>
                </ul>
            </li>
            <!-- Corporate Office tour Page End-->

            <!-- Our Product Page Start-->
            <li class="has-child {{ Request::segment(2) == 'our_products_category' || Request::segment(2) == 'our_product' || Request::segment(2) == 'our_product_banner'  ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'our_products_category' || Request::segment(2) == 'our_product' || Request::segment(2) == 'our_product_banner'  ? 'active' : '' }}">
                    <span data-feather="shopping-cart" class="nav-icon"></span>
                    <span class="menu-text">{{ trans('label.manage_ourproduct') }}</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.our_product.list') }}"
                            class="{{ Request::segment(2) == 'our_product' ? 'active' : '' }}">
                            Add Product</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.ourproductscategory.list') }}"
                            class="{{ Request::segment(2) == 'our_products_category' ? 'active' : '' }}">
                            Add Product Category</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.our_product_banner.edit') }}"
                            class="{{ Request::segment(2) == 'our_product_banner' ? 'active' : '' }}">
                            Add Product Banner</a>
                    </li>
                </ul>
            </li>
            <!-- Our Product Page Start-->

            <!-- New Launch Start-->
            <li class="has-child {{ Request::segment(2) == 'new-launch' || Request::segment(2) == 'new-launch-slider' || Request::segment(2) == 'new-launch-product' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'new-launch' || Request::segment(2) == 'new-launch-slider' || Request::segment(2) == 'new-launch-product' ? 'active' : '' }}">
                    <span data-feather="plus" class="nav-icon"></span>
                    <span class="menu-text">New Launch</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.newLaunch.editbanner') }}"
                            class="{{ Request::segment(2) == 'new-launch' ? 'active' : '' }}">
                            New Launch</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.newLaunch.sliderList') }}"
                            class="{{ Request::segment(2) == 'new-launch-slider' ? 'active' : '' }}">
                            Banner Slider</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.newLaunch.productList') }}"
                            class="{{ Request::segment(2) == 'new-launch-product' ? 'active' : '' }}">
                            New Products</a>
                    </li>

                </ul>
            </li>
            <!-- New Launch End-->

            <!-- our Division Page Start-->
            <li class="has-child {{ Request::segment(2) == 'our_division' || Request::segment(2) == 'ourDivision_page_banner' || Request::segment(2) == 'ourDivision_page_product'  ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'our_division' || Request::segment(2) == 'ourDivision_page_banner' || Request::segment(2) == 'ourDivision_page_product' ? 'active' : '' }}">
                    <span data-feather="aperture" class="nav-icon"></span>
                    <span class="menu-text">{{ trans('label.manage_ourDivision_page') }}</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.ourDivision_page_banner.edit') }}"
                        class="{{ Request::segment(2) == 'ourDivision_page_banner' ? 'active' : '' }}">
                        {{ trans('label.manage_ourDivision_page_banner') }}
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.our_division.list') }}"
                            class="{{ Request::segment(2) == 'our_division' ? 'active' : '' }}">
                            {{ trans('label.manage_our_division') }}
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.ourDivision_page_product.list_product') }}"
                            class="{{ Request::segment(2) == 'ourDivision_page_product' ? 'active' : '' }}">
                            {{ trans('label.manage_ourDivision_page_product') }}
                        </a>
                    </li>
                </ul>
            </li>
            <!-- our Division Page End-->

            <!-- PCD pharma franchise Page Start-->
            <li class="has-child {{ Request::segment(2) == 'pcdpharmafranchise' || Request::segment(2) == 'pcdpharmaadvantage' || Request::segment(2) == 'qualityassurance' || Request::segment(2) == 'logisticpartner' ? 'open' : '' }}">
                <a href="#" class="{{ Request::segment(2) == 'pcdpharmafranchise' || Request::segment(2) == 'pcdpharmaadvantage' || Request::segment(2) == 'qualityassurance' || Request::segment(2) == 'logisticpartner' ? 'active' : '' }}">
                    <span data-feather="box" class="nav-icon"></span>
                    <span class="menu-text">PCD Pharma Franchise</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.pcdpharmafranchise.edit') }}"
                            class="{{ Request::segment(2) == 'pcdpharmafranchise' ? 'active' : '' }}">
                            PCD Pharma Franchise</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.pcdpharmaadvantage.list') }}"
                            class="{{ Request::segment(2) == 'pcdpharmaadvantage' ? 'active' : '' }}">
                            PCD Pharma Advantage</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.qualityassurance.list') }}"
                            class="{{ Request::segment(2) == 'qualityassurance' ? 'active' : '' }}">
                            Quality Assurance</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.logisticpartner.list') }}"
                            class="{{ Request::segment(2) == 'logisticpartner' ? 'active' : '' }}">
                            Logistic Partner</a>
                    </li>
                </ul>
            </li>
            <!-- PCD pharma franchise Page End-->

            <!-- third party manufacturing Page Start-->
            <li class="has-child {{ Request::segment(2) == 'third_party_manufacturing_banner' || Request::segment(2) == 'third_party_manufacturing_benefits' || Request::segment(2) == 'production_divided_unit' || Request::segment(2) == 'deal_with_range' || Request::segment(2) == 'deal_with_range_image' ? 'open' : '' }}">
                <a href="#" class="{{ Request::segment(2) == 'third_party_manufacturing_banner' || Request::segment(2) == 'third_party_manufacturing_benefits' || Request::segment(2) == 'production_divided_unit' || Request::segment(2) == 'deal_with_range' || Request::segment(2) == 'deal_with_range_image' ? 'active' : '' }}">
                    <span data-feather="anchor" class="nav-icon"></span>
                    <span class="menu-text">{{ trans('label.thirdpartymanufacturingbanner') }}</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.third_party_manufacturing_banner.edit') }}"
                            class="{{ Request::segment(2) == 'third_party_manufacturing_banner' ? 'active' : '' }}">
                            Third Party Manufacturing Banner </a>
                    </li>

                    <li class="l_sidebar">
                        <a href="{{ route('admin.third_party_manufacturing_benefits.list') }}"
                            class="{{ Request::segment(2) == 'third_party_manufacturing_benefits' ? 'active' : '' }}">
                            Third Party Manufacturing Benefits</a>
                    </li>

                    <li class="l_sidebar">
                        <a href="{{ route('admin.production_divided_unit.list') }}"
                            class="{{ Request::segment(2) == 'production_divided_unit' ? 'active' : '' }}">
                            Production Divided Unit</a>
                    </li>

                    <li class="l_sidebar">
                        <a href="{{ route('admin.deal_with_range.edit') }}"
                            class="{{ Request::segment(2) == 'deal_with_range' ? 'active' : '' }}">
                            Deal With Range</a>
                    </li>

                    <li class="l_sidebar">
                        <a href="{{ route('admin.deal_with_range_image.list') }}"
                            class="{{ Request::segment(2) == 'deal_with_range_image' ? 'active' : '' }}">
                            Deal With Range Image</a>
                    </li>

                </ul>
            </li>
            <!-- third party manufacturing Page End-->

            <!-- blogs Page Start-->
            <li class="has-child {{ Request::segment(2) == 'blogs' || Request::segment(2) == 'blogpage' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'blogs' || Request::segment(2) == 'blogpage' ? 'active' : '' }}">
                    <span data-feather="users" class="nav-icon"></span>
                    <span class="menu-text">Blogs</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.blogpage.edit') }}"
                            class="{{ Request::segment(2) == 'blogpage' ? 'active' : '' }}">
                            Add Blog Banner</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.blogs.list') }}"
                            class="{{ Request::segment(2) == 'blogs' ? 'active' : '' }}">
                            Add Blog</a>
                    </li>
                </ul>
            </li>
            <!-- blogs Page End-->

            <!-- Latest News Page Start -->
            <li class="has-child {{ Request::segment(2) == 'latestNews' || Request::segment(2) == 'latestNewsPage' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'latestNews' || Request::segment(2) == 'latestNewsPage' ? 'active' : '' }}">
                    <span data-feather="users" class="nav-icon"></span>
                    <span class="menu-text">Latest News</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.latestNewsPage.edit') }}"
                            class="{{ Request::segment(2) == 'latestNewsPage' ? 'active' : '' }}">
                            Add Latest News Banner</a>
                    </li>

                </ul>
            </li>

            <!-- Latest News Page End -->

            <!-- event Page Start-->
            <li class="has-child {{ Request::segment(2) == 'eventpage' || Request::segment(2) == 'events' || Request::segment(2) == 'eventimage' || Request::segment(2) == 'upcoming-events' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'eventpage' || Request::segment(2) == 'events' || Request::segment(2) == 'eventimage' || Request::segment(2) == 'upcoming-events' ? 'active' : '' }}">
                    <span data-feather="calendar" class="nav-icon"></span>
                    <span class="menu-text">Events</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.eventpage.edit') }}"
                            class="{{ Request::segment(2) == 'eventpage' ? 'active' : '' }}">
                            Add Event Banner</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.events.list') }}"
                            class="{{ Request::segment(2) == 'events' ? 'active' : '' }}">
                            Add Events</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.eventimage.list') }}"
                            class="{{ Request::segment(2) == 'eventimage' ? 'active' : '' }}">
                            Add Event Images</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.upcoming-events.list') }}"
                            class="{{ Request::segment(2) == 'upcoming-events' ? 'active' : '' }}">
                            Add Upcoming  Events</a>
                    </li>
                </ul>
            </li>
            <!-- event Page End-->

            <!-- ContactUs page Start-->
            <li class="has-child {{ Request::segment(2) == 'contactus' || Request::segment(2) == 'contactuspage' || Request::segment(2) == 'contactusform' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'contactus' ? 'active' : '' }}">
                    <span data-feather="phone" class="nav-icon"></span>
                    <span class="menu-text">Contact Us</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.contactus.edit') }}"
                            class="{{ Request::segment(2) == 'contactus' ? 'active' : '' }}">
                            Add Contact Us Banner</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.contactuspage.edit') }}"
                            class="{{ Request::segment(2) == 'contactuspage' ? 'active' : '' }}">
                            Contact Us Page</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.contactusform.list') }}"
                            class="{{ Request::segment(2) == 'contactusform' ? 'active' : '' }}">
                            Contact Us List</a>
                    </li>
                </ul>
            </li>
            <!-- ContactUs page End-->

            <!-- T&C page Start-->
            <li class="has-child {{ Request::segment(2) == 'terms' || Request::segment(2) == 'termspage' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'terms' ? 'active' : '' }}">
                    <span data-feather="command" class="nav-icon"></span>
                    <span class="menu-text">T&C</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.terms.edit') }}"
                            class="{{ Request::segment(2) == 'terms' ? 'active' : '' }}">
                            Add T&C Banner</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.termspage.edit') }}"
                            class="{{ Request::segment(2) == 'termspage' ? 'active' : '' }}">
                            T&C Page</a>
                    </li>
                </ul>
            </li>
            <!-- T&C page End-->

            <!-- Social Media Links Start-->
            <li class="has-child {{ Request::segment(2) == 'social' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'social' ? 'active' : '' }}">
                    <span data-feather="monitor" class="nav-icon"></span>
                    <span class="menu-text">Social Media Links</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.social.list') }}"
                            class="{{ Request::segment(2) == 'social' ? 'active' : '' }}">
                            Add Social Media Links</a>
                    </li>
                </ul>
            </li>
            <!-- Social Media Links End-->

            <!-- Privacy Policy Start-->
            <li class="has-child {{ Request::segment(2) == 'privacy-policy' || Request::segment(2) == 'privacy-policy-page' ? 'open' : '' }}">
                <a href="#"
                    class="{{ Request::segment(2) == 'privacy-policy' || Request::segment(2) == 'privacy-policy-page' ? 'active' : '' }}">
                    <span data-feather="shield" class="nav-icon"></span>
                    <span class="menu-text">Privacy Policy</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.privacyPolicy.edit') }}"
                            class="{{ Request::segment(2) == 'privacy-policy' ? 'active' : '' }}">
                            Add Privacy Policy Banner</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.privacyPolicy.editPage') }}"
                            class="{{ Request::segment(2) == 'privacy-policy-page' ? 'active' : '' }}">
                            Privacy Policy Page</a>
                    </li>
                </ul>
            </li>
            <!-- Privacy Policy End-->

            <!-- Form Start-->
            <li class="has-child {{ Request::segment(2) == 'connect-form' ||  Request::segment(2) == 'level-up-form' || Request::segment(2) == 'subscription-form' || Request::segment(2) == 'letstalk-form' || Request::segment(2) == 'inquiry-form' ? 'open' : '' }}">
                <a href="#" class="{{ Request::segment(2) == 'connect-form'  ||  Request::segment(2) == 'level-up-form' || Request::segment(2) == 'subscription-form' || Request::segment(2) == 'letstalk-form' || Request::segment(2) == 'inquiry-form' ? 'active' : '' }}">
                    <span data-feather="file" class="nav-icon"></span>
                    <span class="menu-text">Inquiry Forms</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.connect-form.list') }}"
                            class="{{ Request::segment(2) == 'connect-form' ? 'active' : '' }}">
                            Franchise Opportunity </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.level-up-form.list') }}"
                            class="{{ Request::segment(2) == 'level-up-form' ? 'active' : '' }}">
                            Level Up Form </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.subscription-form.list') }}"
                            class="{{ Request::segment(2) == 'subscription-form' ? 'active' : '' }}">
                            Subscription Form </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.letstalk-form.list') }}"
                            class="{{ Request::segment(2) == 'letstalk-form' ? 'active' : '' }}">
                            Let's Talk Form </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.inquiry-form.list') }}"
                            class="{{ Request::segment(2) == 'inquiry-form' ? 'active' : '' }}">
                            Inquiry Form </a>
                    </li>
                </ul>
            </li>
            <!-- Form End-->

            <!-- Downloads Start-->
            <li class="has-child {{ Request::segment(2) == 'brochure_category' || Request::segment(2) == 'visual_ads_category' || Request::segment(2) == 'brochure_form' || Request::segment(2) == 'visual_ads_form' ? 'open' : '' }}">
                <a href="#" class="{{ Request::segment(2) == 'brochure_category' || Request::segment(2) == 'visual_ads_category' || Request::segment(2) == 'brochure_form' || Request::segment(2) == 'visual_ads_form' ? 'active' : '' }}">
                    <span data-feather="download" class="nav-icon"></span>
                    <span class="menu-text">Downloads</span>
                    <span class="toggle-icon"></span>
                </a>
                <ul>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.brochure_form.list') }}"
                            class="{{ Request::segment(2) == 'brochure_form' ? 'active' : '' }}">
                            Catalogue Form List
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.visual_ads_form.list') }}"
                            class="{{ Request::segment(2) == 'visual_ads_form' ? 'active' : '' }}">
                            Visual Ads Form List
                        </a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.brochurecategory.list') }}"
                            class="{{ Request::segment(2) == 'brochure_category' ? 'active' : '' }}">
                            Catalogue Category</a>
                    </li>
                    <li class="l_sidebar">
                        <a href="{{ route('admin.visualadscategory.list') }}"
                            class="{{ Request::segment(2) == 'visual_ads_category' ? 'active' : '' }}">
                            Visual Ads Category</a>
                    </li>
                </ul>
            </li>
            <!-- Downloads End-->

            <!-- footer Start-->
            <li>
				<a href="{{ route('admin.footer.edit') }}" class="{{ Request::segment(2) == 'footer' ? 'active' : '' }}">
					<span data-feather="activity" class="nav-icon"></span>
					<span class="menu-text">{{ trans('label.footer') }}</span>
				</a>
			</li>
            <!-- footer End-->


        </ul>
    </div>
</aside>
