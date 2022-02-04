<form action="{{url('/addNewTask/store')}}" method="POST">
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-7">

            <div class="col-span-6">
            <label for="task-name" class="block text-sm font-medium text-gray-700">Task name</label>
            <input type="text" required name="taskName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
            </div>

            <div class="col-span-3">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="statusId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value='1'>Not started</option>
                    <option value='2'>Ongoing</option>
                    <option value='3'>Completed</option>
                </select>
            </div>

            <div class="col-span-3">
                <label for="prio" class="block text-sm font-medium text-gray-700">Prority</label>
                <select id="prio" name="prioId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value='1'>Normal</option>
                    <option value='2'>High</option>
                    <option value='3'>Critical</option>
                </select>
            </div>

            <div class="col-span-2">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="categoryId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($categories as $category)
                        <option value='{{$category->id}}'>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
                <select id="project" name="projectId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($projects as $project )
                        <option value='{{$project->id}}'>{{$project->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label for="source-name" class="block text-sm font-medium text-gray-700">Source name</label>
                <input type="text" name="source"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="col-span-3 mb-1">
                <label for="datepicker" class="block text-sm font-medium text-gray-700">Start date</label>
              <x-date-picker name="startDate"/>
            </div>

            <div class="col-span-3">
                <label for="datepicker" class="block text-sm font-medium text-gray-700">Due date</label>
                <x-date-picker name="dueDate"/>
            </div>

            <div class="col-span-6 mb-5">
                <label for="about" class="block text-sm font-medium text-gray-700"> Notes </label>
                <textarea name="notes" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Optional - type notes here"></textarea>
            </div>
        </div>
        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add new task
        </button>
        </div>
    </div>
</form>




