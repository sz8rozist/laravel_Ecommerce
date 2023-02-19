<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kategória törlés</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        Biztos vagy benne hogy törlőd ezt a kategóriát?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                        <button type="submit" class="btn btn-primary">Igen törlöm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Kategória <a href="{{ url('admin/kategoria/create') }}"
                            class="btn btn-danger text-white btn-sm float-end">Új
                            kategória</a> </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Név</th>
                                <th>Státusz</th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                        <i class="mdi mdi-24px mdi-check-circle-outline text-success"></i>
                                        @else
                                        <i class="mdi mdi-24px mdi-minus-circle-outline text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/kategoria/' . $category->id . '/edit') }}"
                                            class="btn text-white btn-success">Szerkesztés</a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger text-white">Törlés</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

<script>
    window.addEventListener('close-modal', event =>{
        $("#deleteModal").modal('hide');
    });
</script>

@endpush
