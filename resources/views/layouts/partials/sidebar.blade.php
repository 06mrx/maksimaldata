<ul class="space-y-1">
    @role('admin')
        <!-- Dashboard -->
        <li>
            <a href="/dashboard" class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200 group-hover:text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Roles -->
        @canany(['view-role', 'create-role'])
            <li>
                <a href="{{ route('admin.roles.index') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200 group-hover:text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857" />
                    </svg>
                    <span>Roles</span>
                </a>
            </li>
        @endcanany

        <!-- Permissions -->
        @canany(['view-permission', 'create-permission'])
            <li>
                <a href="{{ route('admin.permissions.index') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200 group-hover:text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Permissions</span>
                </a>
            </li>
        @endcanany

        <!-- User Management -->
        @canany(['view-user', 'create-user'])
            <li class="mt-4">
                <span class="text-xs uppercase font-semibold text-blue-200">User Management</span>
                <ul class="mt-2 space-y-1 pl-2 border-l border-blue-500">
                    @can('view-user')
                        <li><a href="{{ route('admin.users.index') }}"
                                class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">List Users</a></li>
                    @endcan
                </ul>
            </li>
        @endcanany
        <!-- Training Schedule -->
        @canany(['view-trainingschedule', 'create-trainingschedule'])
            <li>
                <a href="{{ route('admin.training-schedules.index') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200 group-hover:text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Jadwal Pelatihan</span>
                </a>
            </li>
        @endcanany

        @canany(['view-trainingtype', 'create-trainingtype'])
            <li>
                <a href="{{ route('admin.training-types.index') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                    <svg class="h-5 w-5 text-blue-200 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32"
                        viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                        <path fill="currentColor"
                            d="M15.5 14V3l3-1v11zm-9 2q1.175 0 2.313.275T11 17.05V7.2q-1.025-.6-2.162-.9T6.5 6q-.9 0-1.787.175T3 6.7v9.9q.85-.3 1.725-.45T6.5 16m14.5.6V4.575q.525.2 1.025.425t.975.55v14.5q-1.175-.975-2.575-1.513T17.5 18q-1.5 0-2.9.525T12 20q-1.2-.95-2.6-1.475T6.5 18q-1.525 0-2.925.538T1 20.05V5.55q1.2-.825 2.613-1.187T6.5 4q1.75 0 3.388.575T13 6.1v10.95q1.05-.5 2.188-.775T17.5 16q.9 0 1.775.15T21 16.6M7 11.525" />
                    </svg>
                    <span>Jenis Pelatihan</span>
                </a>
            </li>
        @endcanany
        @canany(['view-facility', 'create-facility'])
            <li>
                <a href="{{ route('admin.facilities.index') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                    <svg class="h-5 w-5 text-blue-200 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32"
                        viewBox="0 0 24 24"><!-- Icon from Fluent UI System Icons by Microsoft Corporation - https://github.com/microsoft/fluentui-system-icons/blob/main/LICENSE -->
                        <path fill="currentColor"
                            d="M3 6.25A3.25 3.25 0 0 1 6.25 3h11.5A3.25 3.25 0 0 1 21 6.25v5.658a1.4 1.4 0 0 0-.988-.791a5 5 0 0 0-.512-.085V8.5h-15v9.25c0 .966.784 1.75 1.75 1.75h5.676l-.186.186A2.5 2.5 0 0 0 11.044 21H6.25A3.25 3.25 0 0 1 3 17.75zm12.994 5.683L14.28 10.22a.75.75 0 1 0-1.06 1.06l1.691 1.692a5.1 5.1 0 0 1 1.083-1.04M4.5 7h15v-.75a1.75 1.75 0 0 0-1.75-1.75H6.25A1.75 1.75 0 0 0 4.5 6.25zm6.28 4.28a.75.75 0 1 0-1.06-1.06l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-2.47-2.47zm9.019.814c.353.077.44.507.185.762l-1.905 1.904a1.527 1.527 0 0 0 2.16 2.16l1.905-1.904c.255-.255.685-.168.762.185a4.075 4.075 0 0 1-5.57 4.622l-2.729 2.73a1.527 1.527 0 0 1-2.16-2.16l2.73-2.73a4.074 4.074 0 0 1 4.622-5.57" />
                    </svg> <span>Fasilitas</span>
                </a>
            </li>
        @endcanany
        {{-- Setting menu --}}
        @can('view-setting')
            <li>
                <a href="{{ route('admin.settings.index') }}"
                    class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200 group-hover:text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Pengaturan</span>
                </a>
            </li>
        @endcan
    {{-- @endrole --}}
    @else
        <li>
            <a href="/dashboard" class="flex items-center space-x-3 py-2 px-4 rounded hover:bg-blue-600 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-200 group-hover:text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
    @endrole
</ul>
