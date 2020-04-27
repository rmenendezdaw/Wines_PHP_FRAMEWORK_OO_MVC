function MyPromise(type,url,dataType,data=undefined){
 return new Promise(function(resolve,reject){
        $.ajax({
            type: type,
            url: url,
            dataType: dataType,
            data: data
        })
        .done(function(data){
            resolve(data);
        })
        .fail(function(error){
            reject(error.responseText);
        })

    })
}
