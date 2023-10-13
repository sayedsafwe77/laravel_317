<div>
    <form action="{{ $action }}" method="post">
        @method('delete')
        @csrf
        <button data-delete-id="{{ $model->id }}" class="btn btn-danger delete-btn">Delete</button>
    </form>
</div>
<script>
    document.querySelector("[data-delete-id='{{ $model->id }}']").addEventListener('click', confirmDelete)

    function confirmDelete(e) {
        let result = confirm('are you sure you want to delete');
        console.log(result);
        if (!result) e.preventDefault();
    }
</script>
