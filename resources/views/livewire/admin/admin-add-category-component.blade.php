<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                                <div class="col-md-6">
                                    Add New Category
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.category') }}" class="btn btn-success pull-right" >All Category</a>
                                </div>
                        </div>
                    </d iv>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                       <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Category Name:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" class="Category name" wire:model="name" wire:keyup="generateslug">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Category Slug:</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" class="Category slug" wire:model="slug">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
