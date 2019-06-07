@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" value="@isset($student){{ $student->name }}@endisset">
</div>
<div class="form-group">
    <label for="">Slug</label>
    <input type="text" name="slug" class="form-control" value="@isset($student){{ $student->slug }}@endisset">
</div>
<div class="form-group">
    <label for="">Description</label>
    <input type="text" name="description" class="form-control" value="@isset($student){{ $student->description }}@endisset">
</div>
<div class="form-group">
    <label for="">Avatar</label>
    <input type="file" name="avatar" value="@isset($student){{ $student->avatar }}@endisset">
</div>
<!-- This is a subview -->
