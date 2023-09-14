const request = new XMLHttpRequest();
const body = JSON.parse(localStorage.getItem("products"));
request.onload = () => {
if (request.status === 200) {
console.log("SUCCESS");
}
};

request.open('POST','/cart',true);
request.send(body);