server='dev';



env = {
    local:"http://localhost:8080/common_infra_01/",
    dev:"http://10.40.17.43:9088/erpsac/",
    prod:"http://10.40.17.42:9088/erpsac/",
    sap:"JsonServlet",
    get url() {
      if(server === 'dev') {
          return (env.dev+env.sap);
      }
      else if(server === 'local') {
          return (env.local+env.sap);
      }
    }


};