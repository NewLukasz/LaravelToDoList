@if($type=="categories")
<form action="{{url('/categories/delete')}}" method="POST">
@elseif($type=="projects")
<form action="{{url('/projects/delete')}}" method="POST">
@endif
    @csrf
    <div class="text-xl font-medium mt-4">
        @if($type=="categories")
        Are you sure that you want to delete this category?
        @elseif($type=="projects")
        Are you sure that you want to delete this project?
        @endif
    </div>
    <div id="name" class="flex justify-center my-5 text-3xl">
    </div>

    <div class="class text-sm">
        After deletion all tasks which has assign this value left with unassigned.
    </div>

    <input type="hidden" name="id" id="idForDeletion" value=""/>
    <div class="flex flex-row-reverse mt-5">
        <div>
            <x-button-red class="mx-5">Delete</x-button-red>
        </div>
        <div>
            <x-button-white x-on:click='deleteModalVisibility = ! deleteModalVisibility'>Cancel</x-button-white>
        </div>
    </div>
</form>
