<template>
  <div>
    <div class="container">
        <vue-good-table
            :pagination-options="{
              enabled: true
            }"        
            theme="black-rhino"
            styleClass="vgt-table striped"
            :columns="columns"
            :rows="getProducts">
            <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'action'">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-info" @click="openEditModal(props.row)">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-info" @click="openDeleteModal(props.row.id)">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
              </span>               
              <span v-else>
                {{props.formattedRow[props.column.field]}}
              </span>
            </template>
        </vue-good-table>
    </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
          <div class="modal-body">
            <div class="container">
              <div>
                <el-upload action="/" list-type="picture-card"
                  :on-preview="handlePictureCardPreview"
                  :on-change="updateImageList"
                  :auto-upload="false">
                  <i class="el-icon-plus"></i>
                </el-upload>
                <el-dialog :visible.sync="dialogVisible">
                  <img width="100%" :src="dialogImageUrl" alt="">
                </el-dialog>
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                </div>
                <input v-model="name" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Description</span>
                </div>
                <input v-model="description" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Price/Quantity</span>
                </div>
                <input v-model="price" type="text" class="form-control">
                <input v-model="quantity" type="text" class="form-control">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Color/Size</span>
                </div>
                <input v-model="color" type="text" class="form-control">
                <input v-model="size" type="text" class="form-control">
              </div>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Other Notes</span>
                </div>
                <input v-model="other" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="row">
                  <div class="card" style="width:100%">
                    <div class="card-header">Image Upload Component</div>
                    <div class="card-body">
                        <input type="file" class="form-control">
                    </div>
                  </div>
              </div>
            
              <div class="row">
                <div class="col-sm">
                  Images
                </div>
                <div class="col-sm">
                  a
                </div>
              </div>
            </div>
          </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" @click="sendCreateProductRequest()">Save product</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ref="modalClose">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'products-component',
        computed: {
            ...mapGetters(
                'products', ['getProducts'])
        },
        methods: {
            ...mapActions(
                'products',
                [
                    'setProducts',
                    'createProduct',
                    'deleteProduct'
                ]),
                sendCreateProductRequest() {

                  this.isCreatingPost = true;

                  let payload = {};

                  payload.productTypeId = 1;
                  payload.name = this.name;
                  payload.description = this.description;
                  payload.price = this.price;
                  payload.quantity = this.quantity;
                  payload.color = this.color;
                  payload.size = this.size;
                  payload.other = this.other;

                  this.createProduct(payload);

                  this.name = '';
                  this.description = '';
                  this.price = '';
                  this.quantity = '';
                  this.color = '';
                  this.size = '';
                  this.other = '';

                  this.$refs.modalClose.click()
                  // $.each(this.imageList, function (key, image) {
                    // formData.append(`images[${key}]`, image);
                  // });
                  // return axios.post('/products/create', {
                  //       name: this.name,
                  //       description: this.description,
                  //       price: this.price,
                  //       quantity: this.quantity,
                  //       color: this.color,
                  //       size: this.size,
                  //       other: this.other,
                  //       images: this.imageList

                  //   })
                  //       .then((response) => {
                  //         console.log(response)
                  //           // commit('createProductType', response.data.createdProductType)
                  //       })
                  //       .catch(err => console.log(err))

                  // return axios.post('/products/create', formData, {
                  //   headers: {'Content-Type': 'multipart/form-data'}
                  // }).then((res) => {
                  //   // console.log(res)
                  // }) 
                },
                updateImageList(file) {
                  this.imageList.push(file.raw);
                },
                handlePictureCardPreview(file) {
                  this.dialogImageUrl = file.url;
                  this.dialogVisible = true;
                },
                openEditModal() {
                  this.$swal({
                      title: 'Update the name',
                      input: 'text',
                      inputAttributes: {
                        autocapitalize: 'off'
                      },
                      showCancelButton: true,
                      confirmButtonText: 'Save',
                      showLoaderOnConfirm: true,
                      preConfirm: (login) => {
                        return fetch(`//api.github.com/users/${login}`)
                          .then(response => {
                            if (!response.ok) {
                              throw new Error(response.statusText)
                            }
                            return response.json()
                          })
                          .catch(error => {
                            Swal.showValidationMessage(
                              `Request failed: ${error}`
                            )
                          })
                      },
                      allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                      if (result.value) {
                        Swal.fire({
                          title: `${result.value.login}'s avatar`,
                          imageUrl: result.value.avatar_url
                        })
                      }
                    });
                },
                openDeleteModal(id) {
                  this.$swal.fire({
                      title: 'Are you sure?',
                      text: "This will delete it permanently!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        this.deleteProduct(id);
                      if (result.value) {

                        Swal.fire(
                          'Deleted!',
                          'Product status code has been deleted.',
                          'success'
                        )
                      }
                    })
                },
        },
        data: function () {
            return {
                name: '',
                description: '',
                price: '',
                quantity: '',
                color: '',
                size: '',
                other: '',
                newPaymentMethod: '',
                dialogImageUrl: '',
                dialogVisible: false,
                imageList: [],
                status_message: '',
                status: '',
                isCreatingProduct: false,
                columns: [
                    {
                      label: 'Name',
                      field: 'name',
                    },
                                        {
                      label: 'Description',
                      field: 'description',
                    },
                                        {
                      label: 'Price',
                      field: 'price',
                    },
                    {
                      label: 'Color',
                      field: 'color',
                    },
                    {
                      label: 'Quantity',
                      field: 'quantity',
                    },
                    {
                      label: 'Size',
                      field: 'size',
                    },
                                        {
                      label: 'Other',
                      field: 'otherProductDetails',
                    },
                    {
                      label: 'Created',
                      field: 'createdAt',
                    },
                    {
                      label: 'Action',
                      field: 'action',
                    },                    
                ]
            }
        },
        created() {
            this.setProducts();
        },             
    }
</script>

<style>
  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }

  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }

  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }

  .avatar {
    width: 178px;
    height: 178;
    display: block;
  }

</style>