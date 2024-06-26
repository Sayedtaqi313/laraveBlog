<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('dashboard/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">MYBLOG</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.home') }}" target="_blank">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Posts</div>
            </a>

            <ul>
                <li> <a href="{{ route('admin.posts') }}"><i class="bx bx-right-arrow-alt"></i>All Posts</a>
                </li>
                <li> <a href="{{ route('admin.post.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Post</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-menu'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>

            <ul>
                <li> <a href="{{ route('admin.categories.index') }}"><i class="bx bx-right-arrow-alt"></i>All
                        Categories</a>
                </li>
                <li> <a href="{{ route('admin.categories.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New
                        Category</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-purchase-tag'></i>
                </div>
                <div class="menu-title">Tags</div>
            </a>

            <ul>
                <li> <a href="{{ route('admin.tags') }}"><i class="bx bx-right-arrow-alt"></i>All Tags</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-comment-dots'></i>
                </div>
                <div class="menu-title">Comments</div>
            </a>

            <ul>
                <li> <a href="{{ route('admin.comments') }}"><i class="bx bx-right-arrow-alt"></i>All Comments</a>
                </li>
                <li> <a href="{{ route('admin.comment.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New
                        Comment</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-key'></i>
                </div>
                <div class="menu-title">Roles</div>
            </a>

            <ul>
                <li> <a href="{{ route('admin.roles') }}"><i class="bx bx-right-arrow-alt"></i>All Roles</a>
                </li>
                <li> <a href="{{ route('admin.role.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Role</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Users</div>
            </a>

            <ul>
                <li> <a href="{{ route('admin.users') }}"><i class="bx bx-right-arrow-alt"></i>All Users</a>
                </li>
                <li> <a href="{{ route('admin.user.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New User</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.contacts') }}">
                <div class="parent-icon"><i class='bx bx-mail-send'></i></div>
                <div class="menu-title">Contacts</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.about') }}">
                <div class="parent-icon"><i class='bx bx-info-square'></i></div>
                <div class="menu-title">About</div>
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <div class="parent-icon"><i class='bx bx-pointer'></i></div>
                <div class="menu-title">Main Page</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
