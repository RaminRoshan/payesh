<template>
<div>
    <notifications group="foo" position="bottom right" />
    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-success" data-toggle="modal" data-target="#newService" title="برای ثبت وب سرویس از این قسمت استفاده کنید">
                <i class="fa fa-plus"></i>
                ایجاد وب سرویس
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table-strip">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>کد</th>
                        <th>نام وب سرویس</th>
                        <th>وضعیت</th>
                        <th>دسترسی</th>
                        <th>حذف</th>
                        <th>ویرایش</th>
                        <th>راهنما</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,R) in service_list">
                        <td class="align-middle">{{(R + searchPageNumber * (pagination.current_page - 1)) + 1}}</td>
                        <td>{{item.code}}</td>
                        <td>{{item.name}}</td>
                        <td title="برای تغییر وضعیت فرم از این قسمت استفاده کنید">
                            <button :class="[item.active ? 'btn btn-success' : 'btn btn-danger']" @click="changeServiceStatus(item.id)">
                                <i :class="[item.active ? 'fa fa-check fa-pishgaman' : 'fa fa-close fa-pishgaman']"></i>
                            </button>
                        </td>
                        <td title="چه کسانی به این سرویس دسترسی دارند">
                            <button class="btn btn-warning" @click="update_service_id=item.id;getAccessUser()"  data-toggle="modal" data-target="#search_user"><i class="fa fa-pishgaman fa-lock"></i></button>
                        </td>
                        <td title="برای حذف آیتم از این قسمت استفاده کنید">
                            <button class="btn btn-danger" @click="deleteWebservice(item.id)" >
                                <i class="fa fa-trash fa-pishgaman"></i>
                            </button>
                        </td>
                        <td title="برای ویرایش وب سرویس از این قسمت استفاده کنید">
                            <button class="btn btn-info" @click="update_service_id=item.id;update_service_name=item.name;update_service_description=item.description;update_service_help=item.help" data-toggle="modal" data-target="#updateService">
                                <i class="fa fa-edit fa-pishgaman"></i>
                            </button>
                        </td>
                        <td title="برای دانلود راهنما از اینم آیتم استفاده کنید"><a :href="item.help" class="btn btn-info" target="_blank"><i class="fa fa-download fa-pishgaman"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <nav class="text-center" v-if="pagination.last_page != 1">
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous"
                           @click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                        :class="[ page == isActived ? 'active' : '']">
                        <a href="#"
                           @click.prevent="changePage(page)">{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next"
                           @click.prevent="changePage(pagination.current_page + 1)">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="modal" id="newService">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ایجاد وب سرویس جدید</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>عنوان:</label>
                                    <input v-model="service_name" class="form-control" placeholder="عنوان وب سرویس را وارد کنید ...">
                                </div>
                                <div class="col-sm-12">
                                    <label>لینک راهنما:</label>
                                    <input v-model="service_help" class="form-control" placeholder="عنوان وب سرویس را وارد کنید ...">
                                </div>
                                <div class="col-sm-12">
                                    <label>توضیحات:</label>
                                    <editor
                                        v-model="service_description"
                                        :init="{
                                            height: 250,
                                            menubar: false,
                                            plugins: ['advlist autolink lists link image charmap print preview anchor','searchreplace visualblocks code fullscreen','insertdatetime media table paste code help wordcount'],
                                            toolbar:'undo redo | formatselect | bold italic backcolor | \ alignleft aligncenter alignright alignjustify | \ bullist numlist outdent indent | removeformat | help',

                                        }"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-close"></i>
                                بستن
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveNewWebService">
                                <i class="fa fa-save"></i>
                                ذخیره
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="updateService">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ایجاد وب سرویس جدید</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>عنوان:</label>
                                    <input v-model="update_service_name" class="form-control" placeholder="عنوان وب سرویس را وارد کنید ...">
                                </div>
                                <div class="col-sm-12">
                                    <label>لینک راهنما:</label>
                                    <input v-model="update_service_help" class="form-control" placeholder="عنوان وب سرویس را وارد کنید ...">
                                </div>
                                <div class="col-sm-12">
                                    <label>توضیحات:</label>
                                    <editor
                                        v-model="update_service_description"
                                        :init="{
                                            height: 250,
                                            menubar: false,
                                            plugins: ['advlist autolink lists link image charmap print preview anchor','searchreplace visualblocks code fullscreen','insertdatetime media table paste code help wordcount'],
                                            toolbar:'undo redo | formatselect | bold italic backcolor | \ alignleft aligncenter alignright alignjustify | \ bullist numlist outdent indent | removeformat | help',

                                        }"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-close"></i>
                                بستن
                            </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveUpdateService">
                                <i class="fa fa-save"></i>
                                ذخیره
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="search_user" tabindex="-1" role="dialog" aria-labelledby="search_userLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">انتخاب کاربر</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item active">
                                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">لیست کاربران</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ثبت کاربر</a>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active in" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>نام کاربر</th>
                                                        <th>حذف</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item,R) in accessUserList">
                                                        <td>{{R+1}}</td>
                                                        <td>{{item.user.name}} {{item.user.last_name}}</td>
                                                        <td>
                                                            <button class="btn btn-danger" @click="deleteAccessUser(item.id)"><i class="fa fa-trash fa-pishgaman"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group">
                                                        <div class="md-form form-line form-group">
                                                            <input v-model="searchUser" class="form-control" placeholder="جستجو کاربر ...">
                                                        </div>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" @click="searchUserMetod()">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="col-sm-12 col-md-12 col-lg-12" style="max-height:300px;overflow-y:scroll;margin-top:5px;">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>نام کاربر</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(item,R) in users" style="cursor: pointer;" @click="selectUser(item.id)">
                                                                <td></td>
                                                                <td>{{item.name}} {{item.last_name}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>


<script>
    import Swal from 'sweetalert2';
    import jalaliMoment from "jalali-moment";

    export default {
        data() {
            return {
                accessUserList:[],
                users:[],
                searchUser:'',

                update_service_help:'',
                update_service_name:'',
                update_service_description:'',
                update_service_id:'',

                service_name:'',
                service_description:'',
                service_help:'',

                service_list:'',

                pagination: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1,
                    last_page: 1
                },
                searchPageNumber:10,
                offset:4,
            }
        },
        props:[],
        created: function() {
        },
        mounted() {
            this.getResults();
            console.log(1);
        },
        components: {
        },
        methods: {

            async searchUserMetod() {
                axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                    const token = response.data.token;
                    axios.request({
                        method: 'GET',
                        url: this.getAppUrl() + 'api/admin/webservice?action=searchUser&searchUser='+this.searchUser,
                        headers: {'Authorization': `Bearer ${token}`}
                    }).then(response => {
                        this.users = response.data.users;                
                    }).catch(error => {
                        this.checkError(error);
                    });
                }).catch(error => {
                    this.checkError(error);
                });                
            },
                        
            async getAccessUser() {
                axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                    const token = response.data.token;
                    axios.request({
                        method: 'GET',
                        url: this.getAppUrl() + 'api/admin/webservice?action=getAccessUser&id='+this.update_service_id,
                        headers: {'Authorization': `Bearer ${token}`}
                    }).then(response => {
                        this.accessUserList = response.data.users;                
                    }).catch(error => {
                        this.checkError(error);
                    });
                }).catch(error => {
                    this.checkError(error);
                });                
            },

            async deleteAccessUser(id) {
                try {
                    const result = await Swal.fire({
                        title: 'آیا اطمینان دارید؟',
                        text: 'این کاربر به صورت موقت حذف خواهد شد!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'بله، حذف کن!',
                        cancelButtonText: 'لغو'
                    });

                    if (result.isConfirmed) {
                        axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                        const token = response.data.token;
                        const action = 'deleteAccessUser';
                        axios.request({
                            method: 'delete', // از PUT برای ویرایش استفاده می‌کنیم
                            url: this.getAppUrl() + 'api/admin/webservice',
                            headers: {'Authorization': `Bearer ${token}`},
                            data: { action, id }
                        }).then(response => {
                                Swal.fire(
                                    'حذف شد!',
                                    'دسترسی کاربر موفقیت حذف شد',
                                    'success'
                                );
                                this.searchQuery = '';
                                this.getAccessUser();          
                            }).catch(error => {
                                this.checkError(error);
                            });
                        }).catch(error => {
                            this.checkError(error);
                        });
                    }
                } catch (error) {
                    this.showError(error);
                }
            },

            async selectUser(user_id) {
                axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                
                const token = response.data.token;
                const service_id = this.update_service_id;
                const action = 'selectUser'; 

                axios.request({
                    method: 'POST',
                    url: this.getAppUrl() + 'api/admin/webservice',
                    headers: {'Authorization': `Bearer ${token}`},
                    data: { service_id , user_id , action }
                }).then(response => {
                        Swal.fire(
                            'اضافه شد!',
                            'دسترسی به وب سرویس با موفقیت انتخاب شد.',
                            'success'
                        );   
                        this.getAccessUser();       
                    }).catch(error => {
                        this.checkError(error);
                    });        
                }).catch(error => {
                    this.checkError(error);
                });                
            },

            async searchUserMethod() {
                try {
                    const tokenResponse = await axios.get(this.getAppUrl() + 'sanctum/getToken');
                    const token = tokenResponse.data.token;

                    const response = await axios.request({
                        method: 'post',
                        url: this.getAppUrl() + 'api/admin/webservice',
                        headers: {'Authorization': `Bearer ${token}`},
                        data: {
                            action: 'searchUser',
                            _token: this.getToken(),
                            searchUser: this.searchUser,
                        }
                    });

                    this.users = response.data.users;
                } catch (error) {
                    this.showError(error);
                }
            },

            async changeServiceStatus(id) {
                axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                    const token = response.data.token;
                    const action = 'changeWebserviceStatus';
                    axios.request({
                        method: 'PUT', 
                        url: this.getAppUrl() + 'api/admin/webservice',
                        headers: {'Authorization': `Bearer ${token}`},
                        data: { action , id }
                    }).then(response => {
                        Swal.fire(
                            'ویرایش شد!',
                            'وب سرویس با موفقیت ویرایش شد',
                            'success'
                        );
                        this.searchQuery = '';
                        this.getResults(this.pagination.current_page);          
                    }).catch(error => {
                        this.checkError(error);
                    });
                }).catch(error => {
                    this.checkError(error);
                });                 
            },

            async deleteWebservice(id) {
                try {
                    const result = await Swal.fire({
                        text: 'آیا از حذف این آیتم اطمینان دارید؟',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'تایید',
                        cancelButtonText: 'انصراف'
                    });

                    if (result.isConfirmed) {
                        axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                        const token = response.data.token;
                        const action = 'deleteWebservice';
                        axios.request({
                            method: 'delete', // از PUT برای ویرایش استفاده می‌کنیم
                            url: this.getAppUrl() + 'api/admin/webservice',
                            headers: {'Authorization': `Bearer ${token}`},
                            data: { action, id }
                        }).then(response => {
                                Swal.fire(
                                    'حذف شد!',
                                    'وب سرویس با موفقیت حذف شد',
                                    'success'
                                );
                                this.searchQuery = '';
                                this.getResults(this.pagination.current_page);          
                            }).catch(error => {
                                this.checkError(error);
                            });
                        }).catch(error => {
                            this.checkError(error);
                        });                        
                    }
                } catch (error) {
                    this.showError(error);
                }
            },

            async showDescription(text) {
                await Swal.fire({
                    title: 'توضیحات',
                    text: text,
                    icon: 'info',
                    confirmButtonText: 'بستن'
                });
            },

            async saveUpdateService() {
                axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                    const token = response.data.token;
                    const action = 'saveUpdateWebservice';
                    const help = this.update_service_help;
                    const name = this.update_service_name;
                    const description = this.update_service_description;
                    const id = this.update_service_id;
                    axios.request({
                        method: 'PUT', 
                        url: this.getAppUrl() + 'api/admin/webservice',
                        headers: {'Authorization': `Bearer ${token}`},
                        data: { action, help , name , description , id }
                    }).then(response => {
                        Swal.fire(
                            'ویرایش شد!',
                            'وب سرویس با موفقیت ویرایش شد',
                            'success'
                        );
                        this.searchQuery = '';
                        this.getResults(this.pagination.current_page);          
                    }).catch(error => {
                        this.checkError(error);
                    });
                }).catch(error => {
                    this.checkError(error);
                });                 
            },

            async saveNewWebService() {
                axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                
                const token = response.data.token;
                const help = this.service_help;
                const name = this.service_name;
                const description = this.description;
                const action = 'saveNewWebservice'; 

                axios.request({
                    method: 'POST',
                    url: this.getAppUrl() + 'api/admin/webservice',
                    headers: {'Authorization': `Bearer ${token}`},
                        data: { help, name , description , action }
                    }).then(response => {
                        Swal.fire(
                            'اضافه شد!',
                            'وب سرویس با موفقیت اضافه شد.',
                            'success'
                        );   
                        this.getResults();       
                    }).catch(error => {
                        this.checkError(error);
                    });        
                }).catch(error => {
                    this.checkError(error);
                });                
            },

            async getResults(page = 1) {
                axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
                    const token = response.data.token;
                    axios.request({
                        method: 'GET',
                        url: this.getAppUrl() + 'api/admin/webservice?action=Webservice&page='+page,
                        headers: {'Authorization': `Bearer ${token}`}
                    }).then(response => {
                        this.fetchPagesDetails(response.data.Service);        
                        this.service_list = response.data.Service.data;                
                    }).catch(error => {
                        this.checkError(error);
                    });
                }).catch(error => {
                    this.checkError(error);
                });

            },

            fetchPagesDetails: function (page) {
                this.pagination = {
                    total: page.total,
                    per_page: page.per_page,
                    from: page.from,
                    to: page.to,
                    current_page: page.current_page,
                    last_page: page.last_page
                };
            },

            changePage: function (page) {
                this.getResults(page);
            },

            // ... سایر متدها
        },

        computed: {
            isActived () {
                return this.pagination.current_page;
            },
            pagesNumber () {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                let pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            },
        }
    }
</script>
