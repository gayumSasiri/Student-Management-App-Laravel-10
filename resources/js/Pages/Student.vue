<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student Management App</h2>
        </template>

        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <!-- student add form -->
                        <h1 class="text-xl h-5 font-bold">Add New Student</h1>
                        <form class="p-1" @submit.prevent="studentStore">
                            <div class="form-group py-1">
                              <label for="studentName">Student Name:</label>
                              <input type="text" class="form-control" id="studentName" v-model="student.name" placeholder="Enter student name">
                            </div>
                            <div class="form-group py-1">
                              <label for="studentImage">Student Image:</label>
                              <!-- Todo: image input must be implemented -->
                              <input type="file" class="form-control-file px-2"  id="studentImage">
                            </div>
                            <div class="form-group py-1">
                              <label for="studentAge">Student Age:</label>
                              <input type="number" class="form-control" id="studentAge" v-model="student.age" placeholder="Enter student age">
                            </div>
                            <div class="form-group py-1">
                              <label for="studentStatus">Student Status:</label>
                              <select class="form-control" id="studentStatus">
                                <!-- Todo: v-model can't be use for integers -->
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary py-1">Submit</button>
                          </form>
                    </div>


                    <hr class="border border-primary border-3 opacity-75 m-1">

                    <!-- table veiw-->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="container mt-5">
                            <h2 class="text-xl h-5 font-bold mb-3">Student Details</h2>
                            <table class="table table-light table-hover">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Image</th>
                                <th scope="col">Student Age</th>
                                <th scope="col">Student Status</th>
                                <th scope="col">Delete Student</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="student in students">
                                <td>S00{{ student.id }}</td>
                                <td class="d-flex justify-content-between">
                                    <span >{{ student.name }}</span>
                                    <button class="btn btn-primary mx-3"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <!-- todo here task image -->
                                <td><img  src="student1.jpg" alt="Student Image" class="student-img rounded"></td>
                                <td class="d-flex justify-content-between">
                                    <span class="mx-2">{{ student.age }}</span>
                                    <button class="btn btn-primary mx-2"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td>
                                    <span v-if="student.status == 1" class="mx-2 badge bg-success ">Active</span>
                                    <span v-else class="mx-2 badge bg-warning">Inactive</span>
                                    <button class="btn btn-danger mx-2"><i class="bi bi-lightbulb-off-fill"></i></button>
                                    <button class="btn btn-success mx-2"><i class="bi bi-lightbulb-fill"></i></button>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-danger" @click="deleteStudent(student.id)">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        students: Array
    },
    data() {
        return {
            student: {
                name: '',
                image: '',
                age: '',
            }
        }
    },
    methods: {
        async studentStore() {
            this.$inertia.post('student/store', this.student);

            this.student.name = '';
            this.student.image = '';
            this.student.age = '';
        },

        async deleteStudent(id) {
            this.$inertia.delete(route('student.delete', id));
            // this.$inertia.delete('student/${id}/delete', this.student.id);
        }
    }
}
</script>
