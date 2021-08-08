<template>
    <div>
        <Toast class="p-mt-6" position="top-right" />
        <MyBreadcrumb :home="home" :items="items" />        
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <div class="card p-fluid">
                    <h5>List</h5>
                    <hr />
                    <Toolbar class="p-mb-2">
                        <template #left>
                            <div class="p-fluid p-grid p-formgrid">
                                <div class="p-field p-col-12 p-md-10">
                                    <label for="basic"><small>Quick Search first name or last name</small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" v-model="search" placeholder="Search . . ." />
                                </div>
                                <div class="p-field p-col-12 p-md-2">
                                    <label>&nbsp;</label>
                                    <Button class="p-button-sm" label="Go!" @click="filterUsers({page: 0})" />
                                </div>
                            </div>
                        </template>
                    </Toolbar>
                    <DataTable class="p-datatable-sm" :value="users" dataKey="id" v-model:users="users">
                        <Column field="firstname" header="First Name"></Column>
                        <Column field="lastname" header="Last Name"></Column>
                        <Column field="username" header="Username"></Column>
                        <Column field="hospital" header="Facilities"></Column>
                        <Column field="group_name" header="Groups"></Column>
                        <Column field="id" header="Actions">
                            <template #body="slotProps">
                                <router-link :to="`/users/user/${slotProps.data.id}`"><Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-mr-2" /></router-link>                            
                                <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="deleteUser(slotProps.data.id)" />
                            </template>
                        </Column>
                    </DataTable>
                    <Paginator :rows="pagination.per_page" :totalRecords="pagination.total" @page="fetchUsers($event)"></Paginator>
                </div>
            </div>
        </div>
        <ConfirmDialog group="confirmDelete"></ConfirmDialog>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import Button from 'primevue/button/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import Paginator from 'primevue/paginator/sfc';
import InputText from 'primevue/inputtext/sfc';
import Toolbar from 'primevue/toolbar/sfc';

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast"

export default {
    setup() {

        const toast = useToast()

        return {
            toast
        }

    },
    components: {
        MyBreadcrumb,
        DataTable,
        Paginator,
        Column,
        Button,
        ConfirmDialog,
        InputText,
        Toolbar,
        Toast
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/users'},
            items: [],
            search: ''
        }
    },
    computed: {
        users() {
            return this.$store.state.users.users
        },
        pagination() {
            return this.$store.state.users.pagination
        }
    },
    methods: {
        filterUsers() {
            this.fetchUsers({ page: 0 })
        },
        fetchUsers(event) {
            // event.page: New page number
            // event.first: Index of first record
            // event.rows: Number of rows to display in new page
            // event.pageCount: Total number of pages
            const { page } = event
            this.$store.dispatch('users/GET_USERS', { page, search: this.search })
        },
        deleteUser(id) {
            this.$confirm.require({
                key: 'confirmDelete',
                message: 'Are you sure you want to delete this user?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    this.$store.dispatch('users/DELETE_USER', {id})
                    this.toast.add({severity:'success', summary: 'Successfully Deleted!', detail:'User Information', life: 3000});
                },
                reject: () => {
                    //callback to execute when user rejects the action
                }
            });
        }
    },
    mounted() {
        this.fetchUsers({ page: 0 })
    }
}
</script>