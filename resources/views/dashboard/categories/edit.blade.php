@extends('dashboard.layouts.layout')

@section('body')
    


    <div class="container-fluid">

        <div class="animated fadeIn">
            <form action="{{ Route('dashboard.category.update', $category) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('words.users') }}</strong>
                        </div>
                        <div class="card-block">

                            <img src="{{asset($category->image)}}" alt="" height="50px">


                            <div class="form-group col-md-12">
                                <label>{{ __('words.image') }}</label>
                                <input type="file" name="image" class="form-control" placeholder="{{ __('words.image') }}"
                                   >
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>{{ __('words.status') }}</label>
                                <select name="parent" id="" class="form-control">
                                  
                                    <option value="0" @if ($category->parent == 0 || $category->parent == null)
                                        selected
                                    @endif>main</option>
                                    @foreach ($categories as $item)
                                        @if ($category->id != $item->id)
                                            
                                        
                                        <option @if ($category->parent == $item->id)
                                            selected
                                        @endif value="{{$item->id}}">{{$item->title}}</option>
                                        @endif
                                        @endforeach
                                  
                                </select>
                               
                            </div>

                           
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif"
                                                id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab"
                                                aria-controls="home" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>
                                            <div class="form-group mt-3 col-md-12">
                                                <label>{{ __('words.title') }} - {{ $lang }}</label>
                                                <input type="text" name="{{$key}}[title]" class="form-control"
                                                    placeholder="{{ __('words.title') }}" value="{{$category->translate($key)->title}}">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>{{ __('words.content') }}</label>
                                                <textarea name="{{$key}}[content]" class="form-control" cols="30" rows="10">{{$category->translate($key)->content}}</textarea>
                                            </div>


                                        
                                        </div>
                                    @endforeach

                                </div>



                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                    Submit</button>
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
                                    Reset</button>
                            </div>

                        </div>




                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                Submit</button>
                      
                        </div>



                    </div>
            </form>
        </div>
    </div>
@endsection