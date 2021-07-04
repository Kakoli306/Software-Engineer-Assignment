import EmployeesIndex from "./components/employees/Index";
import EmployeesCreate from "./components/employees/Create";
import EmployeesEdit from "./components/employees/Edit";
import TasksIndex from "./components/tasks/Index";
import TasksCreate from "./components/tasks/Create";
import TasksEdit from "./components/tasks/Edit";
import Dashboard from "./components/dashboard";


export const routes = [
    {
        path: "/employees",
        name: "EmployeesIndex",
        component: EmployeesIndex
    },
    {
        path: "/employees/create",
        name: "EmployeesCreate",
        component: EmployeesCreate
    },
    {
        path: "/employees/:id",
        name: "EmployeesEdit",
        component: EmployeesEdit
    },
    {
        path: "/tasks",
        name: "TasksIndex",
        component: TasksIndex
    },
    {
        path: "/tasks/create",
        name: "TasksCreate",
        component: TasksCreate
    },
    {
        path: "/tasks/:id",
        name: "TasksEdit",
        component: TasksEdit
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard
    }
];
