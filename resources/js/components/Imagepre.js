/* プレビュー機能用のコンポーネント
 *
 */

import * as React from 'react';
import * as ReactDOM from 'react-dom';

var createObjectURL = (window.URL || window.webkitURL).createObjectURL || window.createObjectURL;

class Imagepre extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            image_src: "",
        };
      }
    
    handleChangeFile(e) {
        console.log("呼ばれたっちゃ！");
        var files = e.target.files;
        var image_url = files.length===0 ? "" : createObjectURL(files[0]);
        this.setState({
            image_src: image_url,
        });
    }

    render(){
        return(
            <div>
                <input type="file" id="imagefile" name="imagefile" ref="file" onChange={(e) => this.handleChangeFile(e)} /><br />
                <img src={this.state.image_src} />
            </div>
        );
    }
};

export default Imagepre;

if (document.getElementById('imagepre')) {
    ReactDOM.render(<Imagepre />, document.getElementById('imagepre'));
}
