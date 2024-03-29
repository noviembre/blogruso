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
            'route'	=> 'posts.store',
            'files'	=>	true
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
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Upload a image (Optional)</p>
                        </div>


                        <div class="form-group">
                            <label>Categories</label>
                            {{Form::select('category_id',
                                $categories,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>


                        <div class="form-group">
                            <label>Tags</label>
                            {{Form::select('tags[]',
                                $tags,
                                null,
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
                                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="is_featured">
                            </label>
                            <label>
                                visible
                            </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="status">
                            </label>
                            <label>
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>
                            <textarea name="contenido" id="" cols="30" rows="10" class="form-control" ></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Cancel</button>
                    <button class="btn btn-success pull-right">save</button>
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