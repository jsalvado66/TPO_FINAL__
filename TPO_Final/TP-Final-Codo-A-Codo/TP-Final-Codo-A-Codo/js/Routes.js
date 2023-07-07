
class Routes{
    con = new Connection();
    rutas = [];
    url = "https://luka1204.pythonanywhere.com"
    constructor() {
        axios.get('https://luka1204.pythonanywhere.com/site-map').then((res)=>{
            
            if(res.data.length > 0){

                for(let i = 0; i < res.data.length; i++){
                    let nombreFuncion = res.data[i].endpoint;
                    console.log(res.data[i]);
                    let metodo = res.data[i].method;
                    console.log(metodo);
                    let func = new Function("datos","return this.con.metodo.toLowerCase()(this.url+res.data[i].url,datos)")
                    
                    /* eval("nombreFuncion(datos){return this.con.metodo.toLowerCase()(this.url+res.data[i].url,datos)}") */
                }
            }
        }).catch((err)=>{
            console.log(err);
        })
        
    }
}