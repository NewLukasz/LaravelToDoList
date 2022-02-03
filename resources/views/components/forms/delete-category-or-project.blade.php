<form action="{{url('/categories/delete')}}" method="POST">
    @csrf
    <div class="text-xl font-medium mt-4">
        Are you sure that you want to delete this category?
    </div>
    <div id="name" class="flex justify-center my-5 text-3xl">
    </div>

    <div class="class text-sm">
        After deletion all tasks which has assign this value left with unassigned.
    </div>

    <input type="hidden" name="id" id="idForDeletion" value=""/>
    <div class="flex flex-row-reverse mt-5">
        <x-button-red class="mx-5">Delete</x-button-red>
        <x-button-white x-on:click='deleteModalVisibility = ! deleteModalVisibility'>Cancel</x-button-white>
    </div>
</form>
