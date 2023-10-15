<header>
    <div class="container">
        <div class="header-inner flex items-center justify-between lg:justify-start">
            <div class="header-logo shrink-0">
                <a href="{{route('home')}}">
                    <img alt="CutCode"
                         class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                         src="{{ Vite::asset('resources/assets/images/nav/logo.svg')}}"
                    >
                </a>
            </div><!-- /.header-logo -->

            <div class="header-menu grow hidden lg:flex items-center ml-8 mr-8 gap-8">
                <nav class="2xl:flex gap-8">
                    <a href="/articles"
                       class="ml-4 mr-4 text-white hover:text-pink"
                    >
                        Статьи
                    </a>
                </nav>
            </div><!-- /.header-menu -->

            <div class="header-actions flex items-center gap-3 md:gap-5 z-[9999]">
                <div class="profile relative" x-data="{show: false}">
                    <button
                        @click="show=!show"
                        class="hidden xs:flex items-center text-white hover:text-pink transition"
                    >
                        <span class="sr-only">Профиль</span>

                        <img alt="Username"
                             class="shrink-0 w-10 h-10 rounded-full"
                             src="{{ Vite::asset('resources/assets/images/nav/logo.svg')}}"
                        >

                        <svg class="shrink-0 w-4 h-4 ml-3" fill="currentColor" viewBox="0 0 30 16"
                             xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                  d="M27.536.72a2 2 0 0 1-.256 2.816l-12 10a2 2 0 0 1-2.56 0l-12-10A2 2 0 1 1 3.28.464L14 9.397 24.72.464a2 2 0 0 1 2.816.256Z"
                                  fill-rule="evenodd"/>
                        </svg>
                    </button>

                    <div
                        x-show="show"
                        class="absolute z-50 top-0 right-0 w-[280px] sm:w-[300px] mt-14 p-4 rounded-lg shadow-xl bg-card"
                    >
                        <h5 class="text-body text-xs">Мой профиль</h5>

                        <div class="mt-3">
                            <a href="/profile" class="flex items-center">
                                <img alt="Username"
                                     class="w-11 h-11 rounded-full"
                                     src="{{ Vite::asset('resources/assets/images/nav/logo.svg')}}"
                                >
                                <span class="ml-3 text-xs md:text-sm font-bold text-white">
                                                {{$slot}}
                                </span>
                            </a>
                        </div>

                        <div class="mt-5">
                            <form action="{{route('logout')}}" method="POST" class="profile xs:flex items-center">
                                @csrf
                                @method("DELETE")
                                <button type="submit">
                                    <div class="inline-flex items-center text-body">
                                        <svg class="shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m19.026 7.643-3.233-3.232a.833.833 0 0 0-1.178 1.178l3.232 3.233c.097.098.18.207.25.325-.012 0-.022-.007-.035-.007l-13.07.027a.833.833 0 1 0 0 1.666l13.066-.026c.023 0 .042-.012.064-.014a1.621 1.621 0 0 1-.278.385l-3.232 3.233a.833.833 0 1 0 1.178 1.178l3.233-3.232a3.333 3.333 0 0 0 0-4.714h.003Z"/>
                                            <path
                                                d="M5.835 18.333H4.17a2.5 2.5 0 0 1-2.5-2.5V4.167a2.5 2.5 0 0 1 2.5-2.5h1.666a.833.833 0 1 0 0-1.667H4.17A4.172 4.172 0 0 0 .002 4.167v11.666A4.172 4.172 0 0 0 4.169 20h1.666a.833.833 0 1 0 0-1.667Z"/>
                                        </svg>
                                        <span class="ml-2 font-medium items-center text-body hover:text-pink">Выйти</span>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.header-actions -->
        </div><!-- /.header-inner -->
    </div><!-- /.container -->
</header>
