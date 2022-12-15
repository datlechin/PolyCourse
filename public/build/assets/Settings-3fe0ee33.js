import{d as b,o as u,c as m,a as h,u as s,b as e,f as p,g as r,v as a,e as f,t as g,F as _,l as d}from"./app-ea326635.js";const x={class:"my-5 max-w-3xl"},y=e("h2",{class:"font-bold text-3xl mb-5"},"Thiết lập",-1),v={class:"mb-10"},k=e("h3",{class:"text-2xl font-semibold border-b pb-3"},"Thông tin tài khoản",-1),w=["onSubmit"],T=e("label",{class:"block font-semibold"},"Họ tên",-1),S=e("small",null,"Tên của bạn xuất hiện trên trang cá nhân và bên cạnh các bình luận của bạn.",-1),V=e("label",{class:"block font-semibold"},"Email",-1),B=["value"],U=e("small",null,"Địa chỉ email của bạn.",-1),F=e("label",{class:"block font-semibold"},"Tên tài khoản",-1),N=["value"],D=e("span",{class:"font-bold"},"URL:",-1),E=e("label",{class:"block font-semibold"},"Số điện thoại",-1),H=e("small",null,"Số điện thoại của bạn.",-1),L=e("label",{class:"block font-semibold"},"Giới thiệu",-1),M=e("small",null,"Bio hiển thị trên trang cá nhân và trong các bài viết (blog) của bạn.",-1),j=e("button",{type:"submit",class:"bg-blue-500 text-white px-3 py-1.5 rounded-lg hover:bg-blue-600"},"Cập nhật",-1),C=e("div",null,[e("h3",{class:"text-2xl font-semibold border-b pb-3"},"Liên kết đăng nhập mạng xã hội"),e("div",{class:"my-3"})],-1),R={__name:"Settings",props:{user:Object},setup(t){const i=t,l=b.useForm({name:i.user.name,phone:i.user.phone}),c=()=>{l.post(d("settings"))};return(G,o)=>(u(),m(_,null,[h(s(b.Head),{title:"Thiết lập tài khoản"}),e("div",x,[y,e("div",v,[k,e("form",{onSubmit:p(c,["prevent"]),class:"my-5 space-y-5"},[e("div",null,[T,r(e("input",{type:"text","onUpdate:modelValue":o[0]||(o[0]=n=>s(l).name=n),class:"mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"},null,512),[[a,s(l).name]]),S]),e("div",null,[V,e("input",{type:"text",value:t.user.email,disabled:"",class:"mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"},null,8,B),U]),e("div",null,[F,e("input",{type:"text",value:t.user.username,disabled:"",class:"mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"},null,8,N),e("small",null,[D,f(" "+g(s(d)("profile",{username:t.user.username})),1)])]),e("div",null,[E,r(e("input",{type:"text","onUpdate:modelValue":o[1]||(o[1]=n=>s(l).phone=n),class:"mt-1 block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"},null,512),[[a,s(l).phone]]),H]),e("div",null,[L,r(e("input",{type:"text","onUpdate:modelValue":o[2]||(o[2]=n=>t.user.bio=n),class:"mt-1 block w-full border-0 border-b border-gray-200 focus:ring-0 focus:border-gray-500 px-1.5"},null,512),[[a,t.user.bio]]),M]),j],40,w)]),C])],64))}};export{R as default};
