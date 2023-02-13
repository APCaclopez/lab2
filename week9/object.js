// Create an object:
const descrip = {
  desc_one: "old soul",
  desc_two: "film enthusiast",
  desc_three: "linguaphile",
  printing: function() {
    return this.desc_one + ". " + this.desc_two + ". " + this.desc_three + ".";
  }
};

document.getElementById("demo").innerHTML = descrip.printing();