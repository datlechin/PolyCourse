import{d as u,r as f,o as m,c as k,a as n,u as s,b as e,w as g,e as _,f as V,g as r,v as c,h as x,i as b,j as h,F as q,l as p,_ as C}from"./app.553df5f4.js";import{_ as l,r as w,a as y,b as U}from"./InputError.d5c6a506.js";const $={class:"flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8"},B={class:"sm:mx-auto sm:w-full sm:max-w-md"},M=e("img",{class:"mx-auto h-12 w-auto rounded-lg",src:C},null,-1),N=e("h2",{class:"mt-6 text-center text-3xl font-bold tracking-tight text-gray-900"},"\u0110\u0103ng k\xFD t\xE0i kho\u1EA3n",-1),j={class:"mt-2 text-center text-sm text-gray-600"},D={class:"mt-8 sm:mx-auto sm:w-full sm:max-w-md"},F={class:"bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10"},T=["onSubmit"],E=e("label",{for:"username",class:"block text-sm font-medium text-gray-700"},"T\xEAn t\xE0i kho\u1EA3n",-1),H={class:"mt-1"},L=e("label",{for:"name",class:"block text-sm font-medium text-gray-700"},"H\u1ECD t\xEAn",-1),P={class:"mt-1"},S=e("label",{for:"email",class:"block text-sm font-medium text-gray-700"},"Email",-1),R={class:"mt-1"},z=e("label",{for:"password",class:"block text-sm font-medium text-gray-700"},"M\u1EADt kh\u1EA9u",-1),A={class:"mt-1"},G={class:"relative"},I=["type"],J=e("label",{for:"password_confirmation",class:"block text-sm font-medium text-gray-700"},"Nh\u1EADp l\u1EA1i m\u1EADt kh\u1EA9u",-1),K={class:"mt-1"},O={class:"relative"},Q=["type"],W=e("div",null,[e("button",{type:"submit",class:"flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"},"\u0110\u0103ng k\xFD")],-1),se={__name:"Register",setup(X){const o=u.useForm({username:null,email:null,name:null,password:null,password_confirmation:null}),v=()=>{o.post(p("register"))},d=f(!1),i=f(!1);return(Y,t)=>(m(),k(q,null,[n(s(u.Head),{title:"\u0110\u0103ng k\xFD"}),e("div",$,[e("div",B,[n(s(u.Link),{href:s(p)("home")},{default:g(()=>[M]),_:1},8,["href"]),N,e("p",j,[_(" \u0110\xE3 c\xF3 t\xE0i kho\u1EA3n? "),n(s(u.Link),{href:s(p)("login"),class:"text-blue-500 hover:underline"},{default:g(()=>[_("\u0110\u0103ng nh\u1EADp")]),_:1},8,["href"])])]),e("div",D,[e("div",F,[e("form",{class:"space-y-6",onSubmit:V(v,["prevent"])},[e("div",null,[E,e("div",H,[r(e("input",{id:"username",type:"text","onUpdate:modelValue":t[0]||(t[0]=a=>s(o).username=a),required:"",class:"block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"},null,512),[[c,s(o).username]]),n(l,{message:s(o).errors.username},null,8,["message"])])]),e("div",null,[L,e("div",P,[r(e("input",{id:"name",type:"text","onUpdate:modelValue":t[1]||(t[1]=a=>s(o).name=a),required:"",class:"block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"},null,512),[[c,s(o).name]]),n(l,{message:s(o).errors.name},null,8,["message"])])]),e("div",null,[S,e("div",R,[r(e("input",{id:"email",type:"email","onUpdate:modelValue":t[2]||(t[2]=a=>s(o).email=a),required:"",class:"block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"},null,512),[[c,s(o).email]]),n(l,{message:s(o).errors.email},null,8,["message"])])]),e("div",null,[z,e("div",A,[e("div",G,[r(e("input",{id:"password",type:d.value?"text":"password","onUpdate:modelValue":t[3]||(t[3]=a=>s(o).password=a),required:"",class:"block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"},null,8,I),[[x,s(o).password]]),e("span",{class:"absolute top-2 right-3 cursor-pointer",onClick:t[4]||(t[4]=a=>d.value=!d.value)},[(m(),b(h(d.value?s(w):s(y)),{class:"w-5 h-5 text-gray-800"}))])]),n(l,{message:s(o).errors.password},null,8,["message"])])]),e("div",null,[J,e("div",K,[e("div",O,[r(e("input",{id:"password_confirmation",type:i.value?"text":"password","onUpdate:modelValue":t[5]||(t[5]=a=>s(o).password_confirmation=a),required:"",class:"block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"},null,8,Q),[[x,s(o).password_confirmation]]),e("span",{class:"absolute top-2 right-3 cursor-pointer",onClick:t[6]||(t[6]=a=>i.value=!i.value)},[(m(),b(h(i.value?s(w):s(y)),{class:"w-5 h-5 text-gray-800"}))])]),n(l,{message:s(o).errors.password_confirmation},null,8,["message"])])]),W],40,T),n(U)])])])],64))}};export{se as default};
