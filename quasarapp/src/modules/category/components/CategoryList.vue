<template>
  <q-table
    dense
    :grid="$q.screen.xs"
    title="Categorias"
    :data="getCategorias"
    :columns="columns"
    row-key="name"
    :filter="filter"
    :loading="loading"
    :visible-columns="visibleColumns"
  >
    <template v-slot:top-right>
      <q-input
        borderless
        dense
        debounce="300"
        v-model="filter"
        placeholder="Search"
      >
        <template v-slot:append>
          <q-icon name="search" />
        </template>
      </q-input>
    </template>
    <template v-slot:top-left>
      <div class="row items-center q-gutter-sm">
        <div class="col-">
          <q-btn
            color="primary"
            label="Nuevo"
            icon="add"
            @click="openModalCrear(true)"
          >
            <q-tooltip content-class="bg-accent">Nueva categoria</q-tooltip>
          </q-btn>
        </div>
        <div class="col">
          <q-select
            v-model="visibleColumns"
            multiple
            square
            outlined
            dense
            options-dense
            :display-value="$q.lang.table.columns"
            emit-value
            map-options
            :options="columns"
            option-value="name"
            options-cover
            style="min-width: 150px"
          />
        </div>
      </div>
    </template>
    <template v-slot:body-cell-action="props">
      <q-td :props="props" auto-width class="q-gutter-xs">
        <q-btn
          outline
          round
          color="warning"
          icon="edit"
          no-caps
          dense
          @click="fetchOneCategoria(props.row.id)"
        />
        <q-btn
          outline
          round
          color="negative"
          icon="delete"
          no-caps
          dense
          @click="eliminarCategoria(props.row)"
        />
      </q-td>
    </template>
    <template v-slot:item="props">
      <div
        class="q-pa-xs col-xs-12 col-sm-6 col-md-4 col-lg-3 grid-style-transition"
        :style="props.selected ? 'transform: scale(0.95);' : ''"
      >
        <q-card>
          <q-list dense>
            <q-item v-for="col in props.cols" :key="col.name">
              <q-item-section>
                <q-item-label>{{ col.label }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-item-label caption>{{ col.value }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <div v-if="col.name === 'action'" class="q-gutter-xs">
                  <q-btn
                    outline
                    round
                    size="sm"
                    color="warning"
                    icon="edit"
                    no-caps
                    dense
                    @click="fetchOneCategoria(props.row.id)"
                  />
                  <q-btn
                    outline
                    round
                    size="sm"
                    color="negative"
                    icon="delete"
                    no-caps
                    dense
                    @click="eliminarCategoria(props.row.id)"
                  />
                </div>
              </q-item-section>
            </q-item>
          </q-list>
        </q-card>
      </div>
    </template>
  </q-table>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
  name: 'CategoriaList',
  data () {
    return {
      loading: false,
      filter: '',
      visibleColumns: ['name', 'description', 'action'],
      columns: [
        {
          name: 'id',
          label: 'Id',
          align: 'left',
          field: 'id',
          sortable: true
        },
        { name: 'name', align: 'center', label: 'name', field: 'name', sortable: true, required: true },
        { name: 'description', align: 'center', label: 'Description', field: 'description', sortable: true },
        { name: 'action', align: 'center', label: 'Opciones', field: 'action' }
      ]
    }
  },
  async created () {
    this.loading = true
    this.$q.loading.show({
      delay: 400 // ms
    })
    await this.fetchCategorias()
    this.loading = false
    this.$q.loading.hide()
  },
  methods: {
    // listarCategorias();
    ...mapActions('categoria', ['fetchCategorias']),
    ...mapActions('categoria', ['fetchOneCategoria']),
    ...mapActions('categoria', ['openModalCrear']),
    ...mapActions('categoria', ['deleteCategoria']),
    eliminarCategoria (categoria) {
      // console.log(categoria)
      this.$swal.fire({
        title: `¿Esta seguro de eliminar la categoria ${categoria.nombre}?`,
        html: '<span style="color:red">¡No podra revertir esta acción!</span>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, seguro!'
      }).then((confirmado) => {
        if (confirmado.value) {
          this.deleteCategoria(categoria)
        }
      })
    }
  },
  computed: {
    // LET CATEGORIAS
    ...mapGetters('categoria', ['getCategorias'])
  }
}
</script>

<style></style>
