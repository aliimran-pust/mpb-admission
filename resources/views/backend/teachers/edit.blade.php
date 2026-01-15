@extends('backend.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item">Teacher List</li>
            <li class="breadcrumb-item active">Edit Teacher</li>
        </ol>
        <a class="btn btn-info btn-xs float-right" href="{{ route('teachers.index') }}"><< Go Back</a>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-info">
                <h3 class="card-title"><i class="fa fa-edit"></i> Edit Teacher</h3>
            </div>

            <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="form-group">
                        <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name',$teacher->name) }}"
                               class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email',$teacher->email) }}"
                               class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-form-label">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone',$teacher->phone) }}"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="designation" class="col-form-label">Designation</label>
                        <input type="text" id="designation" name="designation" value="{{ old('designation',$teacher->designation) }}"
                               class="form-control @error('designation') is-invalid @enderror">
                        @error('designation')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="bio" class="col-form-label">Full Biography</label>
                        <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio',$teacher->bio) }}</textarea>
                        @error('bio')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="facebook" class="col-form-label">Facebook</label>
                        <input type="url" id="facebook" name="facebook" value="{{ old('facebook',$teacher->facebook) }}"
                               class="form-control @error('facebook') is-invalid @enderror">
                        @error('facebook')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="whatsapp" class="col-form-label">WhatsApp</label>
                        <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp',$teacher->whatsapp) }}"
                               class="form-control @error('whatsapp') is-invalid @enderror">
                        @error('whatsapp')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="linkedin" class="col-form-label">LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin',$teacher->linkedin) }}"
                               class="form-control @error('linkedin') is-invalid @enderror">
                        @error('linkedin')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="youtube" class="col-form-label">YouTube</label>
                        <input type="url" id="youtube" name="youtube" value="{{ old('youtube',$teacher->youtube) }}"
                               class="form-control @error('youtube') is-invalid @enderror">
                        @error('youtube')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="view_order" class="col-form-label">View Order</label>
                        <input type="number" id="view_order" name="view_order"
                               value="{{ old('view_order',$teacher->view_order) }}" class="form-control">
                        @error('view_order')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',$teacher->status)==1?'selected':'' }}>Active</option>
                            <option value="0" {{ old('status',$teacher->status)==0?'selected':'' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
                    <a href="{{ route('teachers.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
