@extends('layouts.frontend.home_design_2')
@section('content')

<section class="search_inside">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 m-auto">
                <div class="searchbox p-0">
                    <ul class="nav d-flex justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="tabnav active" id="buy-tab" data-toggle="tab" href="#buy" role="tab"
                                aria-controls="buy" aria-selected="true">BUY</a>
                        </li>
                        <li class="nav-item">
                            <a class="tabnav" id="rent-tab" data-toggle="tab" href="#rent" role="tab"
                                aria-controls="rent" aria-selected="false">Rent</a>
                        </li>
                        <li class="nav-item">
                            <a class="tabnav" id="off-plan-tab" data-toggle="tab" href="#offPlan" role="tab"
                                aria-controls="off-plan" aria-selected="false">OFF PLAN</a>
                        </li>
                    </ul>
                    <div class="tab-content searchbg" id="myTabContent">
                    <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                        <form action="{{ url('/search-result') }}" method="post">
                            <div class="search_input">
                                <input type="hidden" value="1" name="property_type">
                                
                                <select class="selectpicker form-control" name="location_id" id="number" data-container="body" data-live-search="true" title="Type your location to search" data-hide-disabled="true">
                                
                                    <option id="city_search" value=''></li>
                                
                                </select>
                                <button type="submit"><i class="icon ion-md-search"></i></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                        <form action="{{ url('/search-result') }}" method="post">
                            <div class="search_input">
                                <input type="hidden" value="2" name="property_type">
                                
                                <select class="selectpicker form-control" name="location_id" id="number" data-container="body" data-live-search="true" title="Type your location to search" data-hide-disabled="true">
                                
                                    <option id="city_search" value=''></li>
                                
                                </select>
                                <button type="submit"><i class="icon ion-md-search"></i></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                        <div class="tab-pane fade" id="offPlan" role="tabpanel" aria-labelledby="off-plan-tab">
                            <form action="{{ url('/search-result') }}" method="post">
                                <div class="search_input">
                                    <input type="hidden" value="3" name="property_type">
                                    <select class="selectpicker form-control" name="search_text" id="number" data-container="body" data-live-search="true" title="Type your location to search" data-hide-disabled="true">
                                    
                                        <option id="city_search" value=''></li>
                                    
                                    </select>
                                    <button type="submit"><i class="icon ion-md-search"></i></button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div id="searchlist"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="smart_container">
    <div class="search_mainsec">
        <div class="properties_catlist">
            <div class="container">
                <div class="prop_inn">
                    <div class="protitle_box">
                        <h4>Off Plan Properties</h4>
                        <h2>In UAE</h2>
                    </div>
                    <div class="proplistbox">
                        <ul>
                            
                            <li>
                                <a href="">{{ $pt->name }}
                                    </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="property_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter_top">
                            <!--<span>Sort By:</span>-->
                            <!--<select>-->
                            <!--    <option selected>Latest</option>-->
                            <!--    <option value="1">Price: Low to High</option>-->
                            <!--    <option value="2">Price: High to Low</option>-->
                            <!--    <option value="3">Near By</option>-->
                            <!--</select>-->
                            <strong><?php echo count($properties); ?> results</strong>
                        </div>
                        <div class="property_list">
                            @if(count($properties) == 0)
                            <div class="pro_con p-3">
                                <p style="text-align: center;"><img src="{{ url('/images/frontend/images/error.png') }}"
                                        alt=""></p>
                                <h5 style="text-align: center;">Sorry, no results found!</h5>
                                <h6 style="text-align: center;">Oh Snap! Zero Results found for your search.</h6>
                            </div>
                            @endif

                            @foreach($properties as $p)
                            <div class="proplist">
                                <div class="proplist_img" style="text-align: center;">
                                    @if(!empty($p->image_name))
                                    <img src="{{ url('/images/frontend/property_images/large/'.$p->image_name) }}">
                                    @elseif(!empty($p->images[0]->medium->link))
                                    <img height="200" src="{{ $p->images[0]->medium->link }}">
                                    @else
                                    <img src="{{ url('images/frontend/property_images/large/default.png') }}">
                                    @endif
                                </div>
                                <div class="proplist_item">
                                    <div class="pro_con">
                                        <label
                                            class="badge badge-warning">{{ $p->property_type }}</label>
                                        <label class="badge badge-success">@if($p->property_for == 1) Buy
                                            @elseif($p->property_for == 2) Rent @elseif($p->property_for == 3) Off Plan
                                            @endif</label>
                                        <h5>{{ $p->city_name }}, {{ $p->state_name }}</h5>
                                        <p>{{ $p->name }}</p>
                                        <h6>@if($p->property_for == 2)
                                            @if(!empty($p->property_price))AED {{ $p->property_price }} <span>/Year</span>@endif
                                            @else
                                            @if(!empty($p->property_price))AED {{ $p->property_price }}@endif
                                            @endif</h6>
                                        <ul>
                                            @if(!empty($p->bedrooms))<li>
                                                <img
                                                    src="{{ url('/images/frontend/images/bedroom.svg') }}">{{ $p->bedrooms }}
                                            </li>@endif
                                            @if(!empty($p->bedrooms))<li>
                                                <img
                                                    src="{{ url('/images/frontend/images/bathroom.svg') }}">{{ $p->bathrooms }}
                                            </li>@endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="callquiery">
                                    <p>Posted on {{ date('M d, Y', strtotime($p->created_at)) }}</p>
                                    <a href="{{ url('/properties/off-plan/'.$p->id) }}" class="readmore_btn">Read More</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                   {{ $properties->render() }}
                </div>
            </div>
        </section>
    </div>
    <section class="nearby_sec pt-1 pb-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="nearby_txtbox">
                        <h4>Nearby</h4>
                        <h3>Areas</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="proplistbox nearby_item">
                        <ul>
                            <li><a href="{{ url('/property/48003/al-quoz') }}">Buy Properties in Al Quoz</a></li>
                            <li><a href="{{ url('/property/47987/dubai-city') }}">Buy Properties in Dubai City</a></li>
                            <li><a href="{{ url('/property/48008/hatta') }}">Buy Properties in Hatta</a></li>
                            <li><a href="{{ url('/property/48064/arjan') }}">Buy Properties in Arjan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ url('/images/frontend/images/dubai.png') }}">
                </div>
            </div>
        </div>
    </section>
</div>

@endsection