<template>
	<div class="layout-profile">
		<div>
			<img src="img/icons/avatar.png" alt="" />
		</div>
		<button class="p-link layout-profile-link" @click="onClick">
			<span>{{ name }}</span>
			<i class="pi pi-fw pi-cog"></i>
		</button>
		<p class="profile">{{ groupName }}</p>
        <transition name="layout-submenu-wrapper">
            <ul v-show="expanded">
				<router-link to="/change-password"><li><button class="p-link"><i class="pi pi-fw pi-lock"></i><span>Change Password</span></button></li></router-link>
                <li><button class="p-link" @click="logout"><i class="pi pi-fw pi-power-off"></i><span>Logout</span></button></li>
            </ul>
        </transition>
		<ConfirmDialog></ConfirmDialog>		
	</div>
</template>

<script>

	import ConfirmDialog from 'primevue/confirmdialog/sfc';

	export default {
		components: {
			ConfirmDialog
		},
		data() {
			return {
				expanded: false
			}
		},
		methods: {
			onClick(event){
				this.expanded = !this.expanded;
				event.preventDefault();
			},
			logout() {
				this.$confirm.require({
					message: 'Are you sure you want to logout?',
					header: 'Confirmation',
					icon: 'pi pi-exclamation-triangle',
					accept: () => {
						this.$store.dispatch('LOGOUT')
					},
					reject: () => {
						//callback to execute when user rejects the action
					}
				});
			}
		},
		computed: {
			name() {
				return `${this.$store.state.profile.firstname} ${this.$store.state.profile.lastname}`
			},
			groupName() {
				return this.$store.state.profile.group_name
			}
		}
	}
</script>

<style scoped>

.profile {
	text-align: center;
	line-height: 24px;
	color:aliceblue;
}

.fullname {
	letter-spacing: 2px;
}

</style>