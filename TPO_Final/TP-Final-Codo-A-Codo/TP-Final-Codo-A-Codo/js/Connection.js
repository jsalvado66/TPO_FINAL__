class Connection{ 
    async   get (url,id=''){
      var result;
  
    await axios.get(`${url}${id}`,)
          .then(function (response) {
            if(response)
                result= response.data;          
          })
          .catch(function (error) {
            if(error.response.status==422) // faltan datos obligatorios 
              result= error.response.data.errors;
            else 
              result= error.response.status;  
          })
          return result;
          
    }

    async post (url,data){
      var result;
  
    await axios.post(url,data)
          .then(function (response) {
            if(response)
                result= response.data;          
          })
          .catch(function (error) {
            if(error.response.status==422) // faltan datos obligatorios 
              result= error.response.data.errors;
            else 
              result= error.response.status;  
          })
          return result;
    }

    async put (url,data,id){
        var result;
    
    await axios.put(`${url}${id}`,data)
            .then(function (response) {
              if(response)
                  result= response.data;          
            })
            .catch(function (error) {
              if(error.response.status==422) // faltan datos obligatorios 
                result= error.response.data.errors;
              else 
                result= {
                    error:error.response.status,
                };  
            })
            return result;
      }
    async delete (url,data){
        var result;
    
        await axios.delete(`${url}`,data)
        .then(function (response) {
        if(response)
            result= response.data;          
        })
        .catch(function (error) {
        if(error.response.status==422) // faltan datos obligatorios 
            result= error.response.data.errors;
        else 
            result= error.response.status;  
        })
        return result;
      }

      
    
  }