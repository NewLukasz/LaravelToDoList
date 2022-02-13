<form action="{{url('/allTasksOvierview/setAsDone')}}" method="POST">
    @csrf
    <div class="text-xl font-medium mt-4">
        Are you sure that you want to delete this category?
    </div>
    <div id="nameOfDoneTask" class="flex justify-center my-5 text-3xl">
        dwq
    </div>

    <div class="class text-sm">
        After deletion all tasks which has assign this value left with unassigned.
    </div>

    <input type="hidden" name="id" id="idOfDoneTask" value=""/>
    <div class="flex flex-row-reverse mt-5">
        <div>
            <x-button-green class="mx-5">Done</x-button-green>
        </div>
        <div>
            <x-button-white x-on:click='doneModalVisibility = ! doneModalVisibility'>Cancel</x-button-white>
        </div>
    </div>
</form>
