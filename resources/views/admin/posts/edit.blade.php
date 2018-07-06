@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>Posts</h1>

        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=>	['posts.update', $post->id],
            'files'	=>	true,
            'method'	=>	'put'
        ])}}


        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    @include('admin.errors')
                </div>


                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$post->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <img src="{{$post->getImage()}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Upload a image (Optional)</p>
                        </div>
                        <div class="form-group">
                            <label>Categories</label>
                            {{Form::select('category_id',
                                $categories,
                              $post->getCategoryID(),
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            {{Form::select('tags[]',
                                $tags,
                                $selectedTags,
                                ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])
                            }}
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{$post->date}}" name="date">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!--
                        ====================
                        checkbox

                        https://laravelcollective.com/docs/5.4/html#checkboxes-and-radio-buttons
                        Generating A Checkbox Or Radio Input That Is Checked

                        =====================
                        -->
                        <div class="form-group">
                            <label>
                                {{Form::checkbox('is_featured', '1', $post->is_featured, ['class'=>'minimal'])}}
                            </label>
                            <label>
                                Visible
                            </label>
                        </div>
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {{Form::checkbox('status', '1', $post->status, ['class'=>'minimal'])}}
                            </label>
                            <label>
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$post->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>
                            <textarea name="contenido" id="" cols="30" rows="10" class="form-control">{{$post->contenido}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Save</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection