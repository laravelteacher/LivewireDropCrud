<div>
<div class="card">
  <div class="card-body">
    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif
    @if(session()->has('error'))
      <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
      </div>
    @endif
    @if($updateCategory)
      @include('livewire.update')
    @else
      @include('livewire.create')
    @endif
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" style='text-align: center;'>
        <thead>
          <tr>
          <th>#</th>  
          <th>Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <!-- by below code we can connect to Category.php of app/Http -->
        <tbody wire:sortable="updateTaskOrder">
            <!-- new data from table come here -->
          @if (count($categories) > 0)
            @foreach ($categories as $category)
            <!-- by below code we can say to Sortable this Row move -->
            <tr wire:sortable.item="{{ $category->id }}" wire:key="task-{{ $category->id }}">
            <!-- the below code is for handle or move Data in Row -->
            <td wire:sortable.handle><h1><a href="#" class="pe-auto">#</h1></td>
                <td>
                  {{$category->name}}
                </td>
                <td>
                  {{$category->description}}
                </td>
                <td>
                    <!-- Buttons for edit & remove -->
                  <button wire:click="edit({{$category->id}})" class="btn btn-primary btn-sm">Edit</button>
                  <button onclick="deleteCategory({{$category->id}})" class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
            @endforeach
          @else
              <tr>
                <td colspan="3" align="center">
                  No Categories Found.
                </td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      <div>
    </div>
    <!-- this Script is for Sweet alert -->
<script>
  function deleteCategory(id){
    if(confirm("Are you sure to delete this record?"))
      window.livewire.emit('deleteCategory',id);
    }
</script>
</div>