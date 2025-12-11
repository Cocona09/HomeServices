<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dropdown Example</title>
    <style>
        .dropdown-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 9px 13px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
            margin-left: 20px;
            margin-top: 15px;
        }

        .dropdown-button:hover {
            background-color: #357ABD;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #D1D5DB;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 10;
            margin-left: 20px;
        }

        .dropdown-content.show {
            display: block;
        }
        .dropdown-link {
            display: block;
            padding: 3px 9px;
            color: #333;
            text-decoration: none;
            font-size: 15px;
        }
        .dropdown-link:hover {
            background-color: #F1F1F1;
        }
        .backBtn{
            padding: 9px 25px;
            position: absolute;
            right: 11.5%;
            top: 3%;
        }
    </style>
</head>
<body>
<button class="backBtn">
    <a href="{{route('main-content.content')}}">Back</a>
</button>
<nav x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="hidden sm:flex sm:items-center sm:ms-5">
                <div class="relative">
                    <!-- Dropdown button -->
                    <button class="dropdown-button" @click="open = !open">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <!-- Dropdown content -->
                    <div class="dropdown-content" :class="{'show': open}">
                        <a class="dropdown-link" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger Icon for Mobile Menu -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</body>
</html>
