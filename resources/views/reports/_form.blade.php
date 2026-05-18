@php($statuses = \App\Models\Report::statuses())

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Child Name</label>
        <input type="text" name="child_name" value="{{ old('child_name', $report->child_name) }}" class="bauhaus-input @error('child_name') is-invalid @enderror">
        @error('child_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-3">
        <label class="form-label">Estimated Age</label>
        <input type="number" min="1" max="17" name="age" value="{{ old('age', $report->age) }}" class="bauhaus-input @error('age') is-invalid @enderror" required>
        @error('age')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-3">
        <label class="form-label">Gender</label>
        <select name="gender" class="bauhaus-select @error('gender') is-invalid @enderror" required>
            <option value="">Select</option>
            @foreach (['male' => 'Male', 'female' => 'Female', 'other' => 'Other', 'prefer_not_to_say' => 'Prefer not to say'] as $value => $label)
                <option value="{{ $value }}" @selected(old('gender', $report->gender) === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Location</label>
        <input type="text" name="location" value="{{ old('location', $report->location) }}" class="bauhaus-input @error('location') is-invalid @enderror" required>
        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Reporter Contact</label>
        <input type="text" name="reporter_contact" value="{{ old('reporter_contact', $report->reporter_contact) }}" class="bauhaus-input @error('reporter_contact') is-invalid @enderror" required>
        @error('reporter_contact')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="6" class="bauhaus-textarea @error('description') is-invalid @enderror" required>{{ old('description', $report->description) }}</textarea>
        @error('description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="col-12">
        <label class="form-label">Image Proof</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" {{ isset($isCreate) && $isCreate ? 'required' : '' }} accept=".jpg,.jpeg,.png,image/*">
        @error('image')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        @if (! empty($report->image))
            <div class="mt-3">
                <img src="{{ asset('storage/'.$report->image) }}" alt="Current proof" class="img-fluid rounded-4 border" style="max-height: 260px;">
            </div>
        @endif
    </div>
</div>