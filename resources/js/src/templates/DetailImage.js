import React from "react";
import Fade from "react-reveal/Fade";

export default function DetailImage({ data }) {
    return (
        <section className="container">
            <div className="container-grid sm">
                <div className="item column-12 row-2">
                    <Fade bottom>
                        <div className="card h-100">
                            <figure className="img-wrapper">
                                <img
                                    className="img-cover"
                                    src={`http://localhost:8000/${data.image}`}
                                    alt={data.title}
                                />
                            </figure>
                        </div>
                    </Fade>
                </div>
            </div>
        </section>
    );
}
