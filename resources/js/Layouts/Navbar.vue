<script>
import { Link } from '@inertiajs/vue3'


export default {
  name: 'Header',
  data() {
    return {
      showDropdown: false,
      showProfileDropdown: false,
    }
  },
  methods: {
    toggleSidebar() {
      document.querySelector('.sidebar')?.classList.toggle('collapsed')
    },
    toggleDropdown(event) {
      event.preventDefault()
      this.showDropdown = !this.showDropdown
    },
    toggleProfileDropdown(event) {
    event.preventDefault()
    this.showProfileDropdown = !this.showProfileDropdown
  },
    handleClickOutside(event) {
      const toggle = document.getElementById('languageToggle')
      const dropdown = document.getElementById('languageDropdownMenu')
      const profileToggle = document.getElementById('profileDropdown')
    const profileDropdown = document.getElementById('profileDropdownMenu')

      if (
        dropdown &&
        !dropdown.contains(event.target) &&
        toggle &&
        !toggle.contains(event.target)
      ) {
        this.showDropdown = false
      }

      if (
      profileDropdown &&
      !profileDropdown.contains(event.target) &&
      profileToggle &&
      !profileToggle.contains(event.target)
    ) {
      this.showProfileDropdown = false
    }
    },
    // logout
    logout() {
            axios.post('/logout')
                .then(() => {
                    // Redirect to login page or homepage
                    window.location.href = '/login';
                })
                .catch(error => {
                    console.error("Logout failed:", error);
                });
        }
  },
  mounted() {
    feather.replace()
    document.addEventListener('click', this.handleClickOutside)
  },
  beforeUnmount() {
    document.removeEventListener('click', this.handleClickOutside)
  }
}
</script>

<template>
  <nav class="navbar">
    <a href="#" class="sidebar-toggler" @click="toggleSidebar">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
      <form class="search-form">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i data-feather="search"></i>
            </div>
          </div>
          <input type="text" class="form-control" placeholder="Search here..." />
        </div>
      </form>

      <ul class="navbar-nav">
            <li class="nav-item dropdown" style="position: relative">
                <Link
                href="#"
                id="languageToggle"
                class="nav-link dropdown-toggle"
                @click="toggleDropdown"
                >
                <i class="flag-icon flag-icon-us mt-1" title="us"></i>
                <span class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
                </Link>

                <div
                id="languageDropdownMenu"
                class="dropdown-menu"
                :style="{ display: showDropdown ? 'block' : 'none' }"
                >
                <Link href="#" class="dropdown-item py-2">
                    <i class="flag-icon flag-icon-us"></i> <span class="ml-1">English</span>
                </Link>
                <Link href="#" class="dropdown-item py-2">
                    <i class="flag-icon flag-icon-fr"></i> <span class="ml-1">French</span>
                </Link>
                <Link href="#" class="dropdown-item py-2">
                    <i class="flag-icon flag-icon-de"></i> <span class="ml-1">German</span>
                </Link>
                <Link href="#" class="dropdown-item py-2">
                    <i class="flag-icon flag-icon-pt"></i> <span class="ml-1">Portuguese</span>
                </Link>
                <Link href="#" class="dropdown-item py-2">
                    <i class="flag-icon flag-icon-es"></i> <span class="ml-1">Spanish</span>
                </Link>
                </div>
            </li>

            <!-- web apps li-->

             <li class="nav-item dropdown nav-apps">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="grid"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="appsDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">Web Apps</p>
									<a href="javascript:;" class="text-muted">Edit</a>
								</div>
								<div class="dropdown-body">
									<div class="d-flex align-items-center apps">
										<a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
										<a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
										<a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
										<a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
									</div>
								</div>
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
							</div>
			</li>

            <!-- messages -->
            <li class="nav-item dropdown nav-messages">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="mail"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="messageDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">9 New Messages</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
								<div class="dropdown-body">
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Leonardo Payne</p>
												<p class="sub-text text-muted">2 min ago</p>
											</div>
											<p class="sub-text text-muted">Project status</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Carl Henson</p>
												<p class="sub-text text-muted">30 min ago</p>
											</div>
											<p class="sub-text text-muted">Client meeting</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Jensen Combs</p>
												<p class="sub-text text-muted">1 hrs ago</p>
											</div>
											<p class="sub-text text-muted">Project updates</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Amiah Burton</p>
												<p class="sub-text text-muted">2 hrs ago</p>
											</div>
											<p class="sub-text text-muted">Project deadline</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Yaretzi Mayo</p>
												<p class="sub-text text-muted">5 hr ago</p>
											</div>
											<p class="sub-text text-muted">New record</p>
										</div>
									</a>
								</div>
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
                        <!-- notification -->
                        <li class="nav-item dropdown nav-notifications">
							<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell"></i>
								<div class="indicator">
									<div class="circle"></div>
								</div>
							</a>
							<div class="dropdown-menu" aria-labelledby="notificationDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">6 New Notifications</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
								<div class="dropdown-body">
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="user-plus"></i>
										</div>
										<div class="content">
											<p>New customer registered</p>
											<p class="sub-text text-muted">2 sec ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="gift"></i>
										</div>
										<div class="content">
											<p>New Order Recieved</p>
											<p class="sub-text text-muted">30 min ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="alert-circle"></i>
										</div>
										<div class="content">
											<p>Server Limit Reached!</p>
											<p class="sub-text text-muted">1 hrs ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="layers"></i>
										</div>
										<div class="content">
											<p>Apps are ready for update</p>
											<p class="sub-text text-muted">5 hrs ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="download"></i>
										</div>
										<div class="content">
											<p>Download completed</p>
											<p class="sub-text text-muted">6 hrs ago</p>
										</div>
									</a>
								</div>
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>

                        <!-- user -->
                        <li class="nav-item dropdown nav-profile" style="position: relative;">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="profileDropdown"
                            @click="toggleProfileDropdown"
                        >
                            <img src="https://via.placeholder.com/30x30" alt="profile">
                        </a>

                        <div
                            id="profileDropdownMenu"
                            class="dropdown-menu"
                            :style="{ display: showProfileDropdown ? 'block' : 'none' }"
                        >
                            <div class="dropdown-header d-flex flex-column align-items-center">
                            <div class="figure mb-3">
                                <img src="https://via.placeholder.com/80x80" alt="">
                            </div>
                            <div class="info text-center">
                                <p class="name font-weight-bold mb-0">Amiah Burton</p>
                                <p class="email text-muted mb-3">amiahburton@gmail.com</p>
                            </div>
                            </div>
                            <div class="dropdown-body">
                            <ul class="profile-nav p-0 pt-3">
                                <li class="nav-item">
                                <a href="pages/general/profile.html" class="nav-link">
                                    <i data-feather="user"></i>
                                    <span>Profile</span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="javascript:;" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Edit Profile</span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="javascript:;" class="nav-link">
                                    <i data-feather="repeat"></i>
                                    <span>Switch User</span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" @click.prevent="logout" class="nav-link">
                                    <i data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>
                                </li>
                    </ul>
    </div>
  </div>
</li>


        </ul>

  <!-- The rest of your nav items below also need to use <li> instead of <div> -->

    </div>
  </nav>
</template>

