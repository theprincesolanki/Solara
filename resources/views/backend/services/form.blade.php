<div class="row g-3">
    <div class="col-md-6">
        <label for="title" class="form-label">Service Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Enter service title" value="{{ isset($service) ? $service->title : old('title') }}">
        <small id="titleError" class="text-danger"></small>
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status" id="status" class="form-select select2">
            <option value="">Select status</option>
            <option value="1" {{ (isset($service) && $service->status == 1) ? 'selected' : '' }}>Active</option>
            <option value="0" {{ (isset($service) && $service->status == 0) ? 'selected' : '' }}>Inactive</option>
        </select>
        <small id="statusError" class="text-danger"></small>
    </div>
    <div class="col-md-12">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control ckeditor" rows="4" placeholder="Enter description">{{ isset($service) ? $service->description : old('description') }}</textarea>
        <small id="descriptionError" class="text-danger"></small>
    </div>
</div>
