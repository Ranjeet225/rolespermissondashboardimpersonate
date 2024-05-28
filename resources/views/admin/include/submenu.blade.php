<ul class="menu-sub ">
  @if (isset($menu))
    @foreach ($menu as $submenu)
        @if(isset($submenu->name))
          @if(auth()->user()->can($submenu->permission))
            <li class="menu-item active">
                @php
                    $currentUrl = request()->url();
                @endphp
                <a  href="{{ isset($submenu->url) ? url($submenu->url) : 'javascript:void(0)' }}"
                class="{{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }} {{ $currentUrl === url($submenu->url) ? 'active bg-light text-dark text-decoration-none' : '' }}"
                @if (isset($submenu->target) and !empty($submenu->target)) target="_blank" @endif >
                    @if (isset($submenu->icon))
                        <i class="{{ $submenu->icon }}"></i>
                    @endif
                    @php
                        $user = Auth::user();
                    @endphp
                    @if(!($user->hasRole('Administrator')))
                        @if ($submenu->name == 'Admin User')
                         <div>{{ (' Users ') ? __(' Users  ') : '' }}</div>
                        @else
                        <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
                        @endif
                    @else
                          <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
                    @endif
                </a>
                {{-- submenu --}}
                @if (isset($submenu->submenu))
                  @include('layouts.sections.menu.submenu',['menu' => $submenu->submenu])
                @endif
            </li>
          @endif
        @else
            {{ '' }}
        @endif
    @endforeach
  @endif
</ul>
