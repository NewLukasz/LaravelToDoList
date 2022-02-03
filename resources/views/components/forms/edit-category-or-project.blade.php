@if($type=="categories")
<form action="{{url('/categories/edit')}}" method="POST">
@elseif($type=="projects")
<form action="{{url('/projects/edit')}}" method="POST">
@endif
    @csrf
    <div class="text-xl font-medium mt-4">
        Your are editing:
    </div>
    <div id="nameOfEditingThing" class="flex justify-center my-5 text-3xl">
    </div>
    <div class="flex justify-center mb-5">
        <div class="mr-4">
            <label for="name">Update name: </label>
        </div>
        <x-input id="inputName" class="border-2" name='name' value=""/>
    </div>
    <div class="class text-sm">
        After edition all tasks which has assign this value will updated automatically.
    </div>

    <input type="hidden" name="id" id="idForEditon" value=""/>
    <div class="flex flex-row-reverse mt-5">
        <div>
            <x-button-blue class="mx-5">Edit</x-button-blue>
        </div>
        <div>
            <x-button-white x-on:click='editModalVisibility = ! editModalVisibility'>Cancel</x-button-white>
        </div>
    </div>
</form>
