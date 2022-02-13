<form action="{{url('/allTasksOvierview/deleteTask')}}" method="POST">
    @csrf
    <div class="text-xl font-medium mt-4">
        Are you sure that you want to delete this task?
    </div>
    <div id="name" class="flex justify-center my-5 text-3xl">
    </div>

    <div class="class text-sm">
        After deletion task will not reachable. There are no possibility to return data from deleted task.
    </div>

    <input type="hidden" name="id" id="idForDeletion" value=""/>
    <div class="flex flex-row-reverse mt-6">
        <div>
            <x-button-red class="mx-4">Delete</x-button-red>
        </div>
        <div>
            <x-button-white x-on:click='deleteModalVisibility = ! deleteModalVisibility'>Cancel</x-button-white>
        </div>
    </div>
</form>
