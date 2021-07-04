<template>
    <section class="content">
        <div class="container-fluid">
             
            <div class="row ">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <div v-for ="task in tasks" :key="task.id">
                            <h3>Name: {{ task.name }} </h3>
                            
                            <p></p>
                           Detail: {{ task.detail }}
                            </div>
                            
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                         /.info-box-content 
                    </div>
                     /.info-box 
                </div> -->
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div>
                    </div>
                </div> -->
                <!-- /.col -->
                <!-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div> -->
            <!-- /.col -->
            </div>
            <!-- /.row -->

<div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Employee List</h3>

                        
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Address</th>
                                    <th>Department</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                v-for="employee in employees"
                                :key="employee.id"
                            >
                                    <td> {{ employee.first_name }}</a></td>
                                    <td>{{ employee.address }}</td>
                                    <td>{{ employee.department.name }}</span></td>
                                   
                                </tr>
                        
                            </tbody>
                        </table>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
                   </div>
            <!-- /.col -->

            
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
</template>

<script>
export default {
    data() {
        return {
            employees: [],
             tasks: [],
            showMessage: false,
            message: "",
            search: null,
            selectedDeprtment: null,
            departments: []
        };
    },
    watch: {
        search() {
            this.getEmployees();
        },
        selectedDeprtment() {
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
        this.axios
                .get('http://localhost:8000/api/tasks/')
                .then(response => {
                    this.tasks = response.data;
                });
    },
    methods: {
        getEmployees() {
            axios
                .get("/api/employees", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDeprtment
                    }
                })
                .then(res => {
                    this.employees = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        deleteEmployee(id) {
            axios.delete("api/employees/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getEmployees();
            });
        }
    }
};
</script>
