<template>
  <div class="row fit">
    <div class="col-auto">
      <div class="text-h5 text-bold">
        {{ $t("wizard.database.database") }}
      </div>
      <q-separator spaced />
      <div>{{ $t("wizard.database.desc") }}</div>
    </div>

    <div class="col-12">
      <ValidationObserver ref="observer">
        <form @submit.prevent="crearCategoria">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-md">
              <ValidationProvider
                rules="required|url"
                :name="labelUrlApp"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  v-model.trim="databaseData.app_url"
                  type="text"
                  :label="labelUrlApp"
                  :error="invalid && validated"
                  :error-message="errorUrlApp"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-md">
              <ValidationProvider
                rules="required"
                :name="labelConnectionType"
                v-slot="{ errors, invalid, validated }"
              >
                <q-select
                  outlined
                  v-model="databaseData.database_connection"
                  :options="connections"
                  :label="labelConnectionType"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-select>
              </ValidationProvider>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-md">
              <ValidationProvider
                rules="required|numeric|max:4"
                :name="labelPort"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  v-model.trim="databaseData.database_port"
                  type="text"
                  :label="labelPort"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-md">
              <ValidationProvider
                rules="required"
                :name="labelDatabaseName"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  v-model.trim="databaseData.database_name"
                  type="text"
                  :label="labelDatabaseName"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-md">
              <ValidationProvider
                rules="required"
                :name="labelDatabaseUsername"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  v-model.trim="databaseData.database_username"
                  type="text"
                  :label="labelDatabaseUsername"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-md">
              <ValidationProvider
                rules=""
                :name="labelDatabasePassword"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  v-model.trim="databaseData.database_password"
                  type="text"
                  :label="labelDatabasePassword"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-md">
              <ValidationProvider
                rules="required"
                :name="labelDatabaseHost"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  v-model.trim="databaseData.database_host"
                  type="text"
                  :label="labelDatabaseHost"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-12 q-pt-xl">
              <q-btn
                color="primary"
                icon="save"
                type="submit"
                :loading="loading"
              >
                {{ $t("wizard.save_cont") }}
              </q-btn>
            </div>
          </div>
        </form>
        <!-- <q-banner v-show="dirty"  class="text-white bg-red">
                    <div v-for="(error, index) in errors" :key="index">
                        <div>{{ error[0] }}</div>
                    </div>
                                    <slot #avatar>
                    <q-icon name="error" color="white" />
                </slot>
                </q-banner> -->
      </ValidationObserver>
    </div>
  </div>
</template>

<script>
import { ValidationObserver } from "vee-validate";

export default {
  name: "Database",
  components: { ValidationObserver },
  data() {
    return {
      databaseData: {
        database_connection: "mysql",
        database_hostname: "127.0.0.1",
        database_port: "3306",
        database_name: null,
        database_username: null,
        database_password: null,
        app_url: window.location.origin
      },
      loading: false,
      connections: ["sqlite", "mysql", "pgsql", "sqlsrv"]
    };
  },
  methods: {
    async next() {
      this.$v.databaseData.$touch();
      if (this.$v.databaseData.$invalid) {
        return true;
      }
      this.loading = true;
      try {
        let response = await window.axios.post(
          "/api/admin/onboarding/environment/database",
          this.databaseData
        );
        if (response.data.success) {
          this.$emit("next");
          window.toastr["success"](
            this.$t("wizard.success." + response.data.success)
          );
          return true;
        } else if (response.data.error) {
          window.toastr["error"](
            this.$t("wizard.errors." + response.data.error)
          );
        } else if (response.data.error_message) {
          window.toastr["error"](response.data.error_message);
        }
      } catch (e) {
        window.toastr["error"](e.response.data.message);
      } finally {
        this.loading = false;
      }
    },
    async crearCategoria() {
      const isValid = await this.$refs.observer.validate();
      if (!isValid) {
        this.$q.notify({
          type: "negative",
          position: "top-right",
          message: this.$t("wizard.database.database_error")
        });
        return;
      }
      this.loading = true;
      try {
        let response = await this.$axios.post(
          "/api/admin/onboarding/environment/database",
          this.databaseData
        );
        if (response.data.success) {
          this.$emit("next");
          this.$q.notify({
            type: "positive",
            position: "top-right",
            message: this.$t("wizard.success." + response.data.success)
          });
          return true;
        } else if (response.data.error) {
          this.$q.notify({
            type: "negative",
            position: "top-right",
            message: this.$t("wizard.errors." + response.data.error)
          });
        } else if (response.data.error_message) {
          this.$q.notify({
            type: "negative",
            position: "top-right",
            message: response.data.error_message
          });
        }
      } catch (e) {
        this.$q.notify({
          type: "negative",
          position: "top-right",
          message: e.response.data.message
        });
      } finally {
        this.loading = false;
      }
    }
  },
  computed: {
    labelUrlApp() {
      return `${this.$t("wizard.database.app_url")} (*)`;
    },
    labelConnectionType() {
      return `${this.$t("wizard.database.connection")} (*)`;
    },
    labelPort() {
      return `${this.$t("wizard.database.port")} (*)`;
    },
    errorUrlApp() {
      return this.$t("wizard.database.app_url_error");
    },
    labelDatabaseName() {
      return `${this.$t("wizard.database.db_name")} (*)`;
    },
    labelDatabaseUsername() {
      return `${this.$t("wizard.database.username")} (*)`;
    },
    labelDatabasePassword() {
      return `${this.$t("wizard.database.password")} (*)`;
    },
    labelDatabaseHost() {
      return this.$t("wizard.database.host");
    }
  }
};
</script>
<style>
</style>
