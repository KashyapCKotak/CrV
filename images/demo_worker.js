var i = 0;
var globalCryptoValue;
var globalFiatValue;
console.log(self.globalCryptoValue);

function timedCount() {
    console.log(self.globalCryptoValue);
    i = i + 1;
    postMessage(i);
    setTimeout("timedCount()",500);
    console.log("Worker counting");
}

self.onmessage = function(e) {
    this.globalCryptoValue=e.data[0];
    this.globalFiatValue=e.data[1];
    timedCount();
};