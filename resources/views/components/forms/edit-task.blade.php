<template x-if="editModalVisibility">
    <script>
        window.onload = setUpDataInEditModal();

    function setUpDataInEditModal(){
        var idOfChosenTask = document.getElementById('idOfTaskForEdit').value;
        document.getElementById('hiddenPresentStatus').innerHTML="piesek";
        document.getElementById('hiddenPresentStatus').value="4";
        @json($tasks).forEach(przyklad);

        function przyklad(task){
            if(idOfChosenTask==task.id){
                document.getElementById('nameOfTaskForEdit').innerHTML=task.name;
                document.getElementById('taskName').value=task.name;
                document.getElementById('hiddenPresentStatus').innerHTML=showStatusString(task.statusId);
                document.getElementById('hiddenPresentStatus').value=task.statusId;
                document.getElementById('hiddenPresentPrio').value=task.prioId;
                document.getElementById('hiddenPresentPrio').innerHTML=showPriorityString(task.prioId);
                document.getElementById('hiddenPresentCategory').innerHTML=getCategoryOrProjectNameBasedOnId(@json($categories), task.categoryId);
                document.getElementById('hiddenPresentCategory').value=task.categoryId;
                document.getElementById('hiddenPresentProject').innerHTML=getCategoryOrProjectNameBasedOnId(@json($projects), task.projectId);
                document.getElementById('hiddenPresentProject').value=task.projectId;
                document.getElementById('source').value=task.source;
                document.getElementById('dueDate').value=new Date(task.dueDate);
                document.getElementById('startDate').value=new Date(task.startDate);
                document.getElementById('notes').value=task.notes;
            }
        }

        function getCategoryOrProjectNameBasedOnId(projectsOrCategoriesdataArray, id){
        var name;
        projectsOrCategoriesdataArray.forEach(item=>{
            if(item.id == id){
                name=item.name;
            }
        });
        return name;
        }

        function showStatusString(statusId){
            switch(statusId){
                case 1:
                    return "Not started";
                case 2:
                    return "Ongoing";
                case 3:
                    return "Completed";
            }
        }

        function showPriorityString(prioId){
        switch(prioId){
            case 1:
                return "Normal";
            case 2:
                return "High";
            case 3:
                return "Critical";
        }
    }
    }
    </script>
</template>

<form id="editTaskForm" class="mojaKlasa" action="{{url('/allTasksOvierview/editTask')}}" method="POST">
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-7">

            <div class="col-span-6">
            <div class="text-l font-medium mt-4">
                Your are editing:
            </div>
            <div id="nameOfTaskForEdit" class="flex justify-center my-5 text-xl">
            </div>
            <div class="col-span-6">
                <label for="task-name" class="block text-sm font-medium text-gray-700">Task name</label>
                <input type="text" required id="taskName" name="taskName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
            </div>

            <input type="hidden" name="taskId" id="idOfTaskForEdit" value=""/>
            </div>

            <div class="col-span-3">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="statusId" value="kon" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value='' id='hiddenPresentStatus' hidden selected></option>
                    <option value='1'>Not started</option>
                    <option value='2'>Ongoing</option>
                    <option value='3'>Completed</option>
                </select>
            </div>

            <div class="col-span-3">
                <label for="prio" class="block text-sm font-medium text-gray-700">Prority</label>
                <select id="prio" name="prioId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value='' id='hiddenPresentPrio' hidden selected></option>
                    <option value='1'>Normal</option>
                    <option value='2'>High</option>
                    <option value='3'>Critical</option>
                </select>
            </div>

            <div class="col-span-3">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="categoryId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value='' id='hiddenPresentCategory' hidden selected></option>
                    @foreach ($categories as $category)
                        <option value='{{$category->id}}'>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-3">
                <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
                <select id="project" name="projectId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value='' id='hiddenPresentProject' hidden selected></option>
                    @foreach ($projects as $project )
                        <option value='{{$project->id}}'>{{$project->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label for="source-name" class="block text-sm font-medium text-gray-700">Source name</label>
                <input type="text" id="source" name="source"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-2 mb-1">
                <label for="datepicker" class="block text-sm font-medium text-gray-700">Start date</label>
              <x-date-picker name="startDate" id="startDate"/>
            </div>

            <div class="col-span-2">
                <label for="datepicker" class="block text-sm font-medium text-gray-700">Due date</label>
                <x-date-picker name="dueDate" id="dueDate"/>
            </div>

            <div class="col-span-6">
                <label for="about" class="block text-sm font-medium text-gray-700"> Notes </label>
                <textarea name="notes" id="notes" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Optional - type notes here"></textarea>
            </div>
            <div class="col-span-3">
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit task
                </button>
            </div>
            <div class="col-span-3">
                <x-button-white x-on:click='editModalVisibility = ! editModalVisibility' class="w-full h-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md">
                    Cancel
                </x-button-white>
            </div>
        </div>

        </div>
    </div>
</form>





